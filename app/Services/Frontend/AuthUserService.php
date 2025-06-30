<?php

namespace App\Services\Frontend;

use Exception;
use App\Models\User;
use App\Mail\SendCode;
use App\Models\Plan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class AuthUserService
{
    /**
     * Create a new class instance.
     */
    protected $channel;
    protected $blockingUserService;
    protected $accountService;

    public function __construct(AccountService $accountService, BlockingUserService $blockingUserService)
    {
        //
        $this->blockingUserService = $blockingUserService;
        $this->accountService = $accountService;
        $this->channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/auth.log'),
        ]);
    }

    public function register($request)
    {
        // ? check blocking user
        $type = 'user-register';
        $userBlocking = $this->blockingUserService->isBlocked($type);

        if ($userBlocking) {
            $this->blockingUserService->createOrUpdateBlockedUser($type);
            $error = [
                "status" => "error",
                'errors' => [
                    'auth-error' => "Перевищено кількість невдалих спроб. <br> З метою безпеки реєстрацію на сьогодні заблоковано.",
                ]
            ];
            return response()->json($error);
        }

        if ($request->action == 'send-code') {
            $request->validate([
                'email' => 'required|email',
            ]);

            $email = strip_tags($request->email);

            $user = User::where('email', $email)->first();
            if ($user) {
                $res = [
                    "status" => "error",
                    'errors' => [
                        'email' => __('messages.email_already_registered'),
                    ]
                ];
                return response()->json($res);
            }

            $code = codeGenerator();
            $data = [
                'code' => $code,
            ];

            try {
                // ? send email
                Mail::to($email)->send(new SendCode($data));

                Cache::put($email, $code, now()->addMinutes(10));

                $res = [
                    "status" => "ok",
                    'message' => __('messages.send_code_success'),
                ];

                return response()->json($res);
            } catch (Exception $ex) {

                Log::stack([$this->channel])->error('Error send email code: ', ['error' => $ex->getMessage()]);
                $errors = [
                    "status" => "error",
                    'errors' => [
                        'send-email' => __('messages.error_sending_email'),
                    ]
                ];
                return response()->json($errors);
            }
        }

        if ($request->action == 'sign-up') {

            $request->validate([
                'action' => 'required',
                'email' => 'required|email',
                'code' => 'required',
                'password' => 'required|min:10',
            ]);


            $email = strip_tags($request->email);
            $code = strip_tags($request->code);


            $user = User::where('email', $email)->first();
            if ($user) {
                $error = [
                    "status" => "error",
                    'errors' => [
                        'email' => __('messages.email_already_registered'),
                    ]
                ];
                return response()->json($error);
            }

            $codeCache = Cache::pull($email);

            if ($code != $codeCache) {

                // ? add user blocking
                $this->blockingUserService->createOrUpdateBlockedUser($type);

                $error = [
                    "status" => "error",
                    'errors' => [
                        'code' => __('messages.invalid_verification_code'),
                    ]
                ];
                return response()->json($error);
            }


            $userData = [
                'email' => $email,
                'password' => Hash::make($request->password),

            ];
            $user = User::create($userData);



            if ($user) {
                // ? create account accountService

                $account = $this->accountService->createAccount($user);

                if (!$account) {
                    $user->delete();

                    $res = [
                        "status" => "error",
                        'errors' => [
                            'register' => __('messages.error_registration'),
                        ]
                    ];

                    return response()->json($res);
                }


                // ? authenticate user
                $userAuthData = [
                    'email' => $email,
                    'password' => $request->password,
                ];

                if ($this->authenticate($userAuthData)) {

                    $res = [
                        "status" => "ok",
                        "auth" => true,
                        'message' => __('messages.success_registration'),
                    ];

                    return response()->json($res);
                }
            }


            $res = [
                "status" => "error",
                'errors' => [
                    'register' => __('messages.error_registration'),
                ]
            ];

            return response()->json($res);
        }


        $error = [
            "status" => "error",
            'errors' => [
                'action' => "Invalid action field value",
            ]
        ];
        return response()->json($error);
    }

    public function login($request)
    {

        // ? check blocking user
        $type = 'user-login';
        $userBlocking = $this->blockingUserService->isBlocked($type);

        if ($userBlocking) {
            $this->blockingUserService->createOrUpdateBlockedUser($type);
            $error = [
                "status" => "error",
                'errors' => [
                    'auth-error' => "Перевищено кількість невдалих спроб. <br> З метою безпеки авторизацію на сьогодні заблоковано.",
                ]
            ];
            return response()->json($error);
        }

        if ($request->action == 'sign-in') {

            $request->validate([
                'action' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $email = strip_tags($request->email);

            $userAuthData = [
                'email' => $email,
                'password' => $request->password,
            ];


            $userBlocked = User::where('email', $email)->where('blocked', 1)->first();
            if ($userBlocked) {
                $error = [
                    "status" => "error",
                    'errors' => [
                        'blocked' => "Обліковий запис заблоковано.",
                    ]
                ];
                return response()->json($error);
            }

            if ($this->authenticate($userAuthData)) {

                $res = [
                    "status" => "ok",
                    'auth' => true,
                ];

                return response()->json($res);
            }

            // ? add user blocking
            $this->blockingUserService->createOrUpdateBlockedUser($type);

            $error = [
                "status" => "error",
                'errors' => [
                    'login' => "Невірний e-mail або пароль",
                ]
            ];
            return response()->json($error);
        }

        $error = [
            "status" => "error",
            'errors' => [
                'action' => "Invalid action field value",
            ]
        ];
        return response()->json($error);
    }

    public function authenticate($userAuthData)
    {
        if (Auth::attempt($userAuthData)) {

            request()->session()->regenerate();

            return true;
        }

        return false;

        // Auth::loginUsingId($userId);
        // $request->session()->regenerate();
    }
}