<?php

namespace App\Services\Frontend;

use App\Models\Plan;
use App\Models\Product;
use App\Models\Secret;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Services\Frontend\BlockingUserService;
use Illuminate\Contracts\Encryption\DecryptException;

class SecretService
{
    /**
     * Create a new class instance.
     */
    protected $channel;
    protected $blockingUserService;
    protected $accountService;

    public function __construct(BlockingUserService $blockingUserService, AccountService $accountService)
    {
        $this->blockingUserService = $blockingUserService;
        $this->accountService = $accountService;

        $this->channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/secret.log'),
        ]);
    }

    public function createSecret($request)
    {
        // 
        // $this->user = auth('web')->user();
        // $user = Auth::guard('web')->user();

        $errors = [];
        $product = null;


        $user = auth('web')->user();

        if ($user) {
            // ? get user plan
            $product = $this->accountService->getProduct($user->id);
        } else {
            $product = Product::find(1);
        }

        if (!$product) {
            $errors['product'] = 'Error: get current product';

            $error = [
                "status" => "error",
                'errors' => $errors,
            ];

            return response()->json($error);
        }
        // $request->validate([
        //     'secret.text' => "required|string|between:1,$product->symbol",
        //     'secret.ttl' => "required|integer",
        // ]);


        $secret_ttl = null;
        // ? ttl
        if ($product->lifespans->isNotEmpty()) {
            foreach ($product->lifespans as $lifespan) {
                if ($request->secret['ttl'] == $lifespan->ttl) {
                    $secret_ttl = $lifespan->ttl;
                }
            }
        }

        if (!$secret_ttl) {
            $errors['ttl'] =  "Error: wrong time ttl";

            $error = [
                "status" => "error",
                'errors' => $errors,
            ];

            return response()->json($error);
        }


        $secret_passphrase = null;
        // ? passphrase
        if ($product->passphrase && request()->has('secret.passphrase')) {
            $secret_passphrase = Hash::make($request->secret['passphrase']);
        }

        $email_notification = null;
        // ? notification
        if ($product->notification && request()->has('secret.notification')) {

            $email_notification = $user->email;
        }


        $secret_text = strip_tags($request->secret['text']);

        $secret_hash = Hash::make($secret_text);

        // ? encrypt
        $secret_encrypt = Crypt::encryptString($secret_text);
        // ? generate unique string uri
        $secret_key = $this->generateUniqueString(33);
        $secret_url = url("/secret/{$secret_key}");

        $created = Carbon::now();
        $deleted = Carbon::now()->addSecond($secret_ttl);

        // ? create secret
        $secretData = [
            'text' => $secret_encrypt,
            'key' => $secret_key,
            'hash' => $secret_hash,
            'passphrase' => $secret_passphrase,
            'email_notification' => $email_notification,
            'ttl' => $secret_ttl,
            'deleted_at' => $deleted,
        ];

        $secret =  Secret::create($secretData);
        if (!$secret) {
            $errors['secret'] =  "Error: saving secret";
            $error = [
                "status" => "error",
                'errors' => $errors,
            ];

            return response()->json($error);
        }

        // ? response success
        $resData = [
            'status' => 'ok',

            'secret' => [
                'created' => $created->getTimestamp(),
                'ttl' => $secret_ttl,
                'url' => $secret_url,
            ],
        ];

        if ($secret_passphrase) {
            $resData['secret']['passphrase'] = $secret_passphrase ? true : false;
        }
        if ($email_notification) {
            $resData['secret']['notification'] = $email_notification ? true : false;
        }

        return response()->json($resData);
    }


    public function getSecret($key)
    {
        $type = 'secret';
        $userBlocking = $this->blockingUserService->isBlocked($type);

        if ($userBlocking) {
            $this->blockingUserService->createOrUpdateBlockedUser($type);
            return false;
        }


        $secret = Secret::where('key', $key)->first();
        if ($secret) {
            if (Carbon::parse($secret->deleted_at) < Carbon::now()) {
                $secret->delete();
                $secret = null;
            }
            return $secret;
        }

        $this->blockingUserService->createOrUpdateBlockedUser($type);

        return false;
    }


    public function showDeleteSecret($request, $key)
    {
        $secret = $this->getSecret($key);



        if ($secret) {
            // ? check password logic

            if ($secret->passphrase) {
                // $request->validate([
                //     'passphrase' => 'required',
                // ]);
                if (!request()->has('passphrase')) {
                    $error = [
                        "status" => "error",
                        'errors' => [
                            'passphrase' => __('messages.error_passphrase'),
                        ]
                    ];
                    return response()->json($error);
                }

                if (!Hash::check($request->passphrase, $secret->passphrase)) {
                    $type = 'secret';
                    $this->blockingUserService->createOrUpdateBlockedUser($type);

                    $error = [
                        "status" => "error",
                        'errors' => [
                            'passphrase' => __('messages.error_passphrase'),
                        ]
                    ];
                    return response()->json($error);
                }
            }

            try {
                $secret_decrypt = Crypt::decryptString($secret->text);

                $secret->delete();

                $resData = [
                    'status' => 'ok',
                    'secret' => [
                        'text' => $secret_decrypt,
                    ],
                ];

                return response()->json($resData);
            } catch (DecryptException $ex) {

                // ? log error and email error $e->getMessage();
                Log::stack([$this->channel])->error('Error decrypt secret: ', ['error' => $ex->getMessage()]);

                $error = [
                    "status" => "error",
                    'errors' => ['secret' => 'Помилка під час розшифрування секрету.'],
                ];

                return response()->json($error);
            }
        }



        $error = [
            "status" => "error",
            'errors' => ['no-secret' => 'The information is no longer available or never existed.'],
        ];

        return response()->json($error);
    }


    public function generateUniqueString($len = 10, $num = 0)
    {

        $secret_key = $num == 0 ?  str(str()->random($len))->lower() : str(str()->random($len))->lower() . $num;

        $data = ['key' => $secret_key,];

        $num++;

        $rules = ['key' => 'unique:secrets'];

        $validate = Validator::make($data, $rules)->passes();

        return $validate ? $data['key'] : $this->generateUniqueString($len, $num);
    }
}