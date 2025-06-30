<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Secret;
use App\Models\Account;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Artisan;

use App\Services\Frontend\SecretService;
use App\Services\Frontend\AccountService;
use Illuminate\Support\Facades\Validator;
use App\Services\Backend\SecretBackendService;
use App\Services\Backend\AccountBackendService;

class TestController extends Controller
{
    //
    protected $accountBackendService;
    protected $secretBackendService;
    public $secretService;

    public function __construct(AccountBackendService $accountBackendService, SecretBackendService $secretBackendService, SecretService $secretService)
    {
        // 
        $this->accountBackendService = $accountBackendService;
        $this->secretBackendService = $secretBackendService;
        $this->secretService = $secretService;
    }
    public function index(Request $request)
    {

        // $req = (object) [
        //     'secret' => [
        //         'text' => 'text secret',
        //         'ttl' => '300',
        //     ]
        // ];
        // dump(gettype($request), gettype($req));
        // return;


        // $secret = $this->secretService->createSecret($req);

        // dump($secret);
        // User::create(['email' => 'rrr']);

        // dump($secret_ttl);
        // dump(request());
        // dump(request()->header('Referer'));

        // return;




        // ? test set APP_PREVIOUS_KEYS   value APP_KEY .env
        // dump(env('APP_KEY'));
        // dump(env('APP_PREVIOUS_KEYS'));
        // $app_previous_keys = env('APP_PREVIOUS_KEYS');
        // $app_key = env('APP_KEY');

        // file_put_contents(app()->environmentFilePath(), str_replace(
        //     'APP_PREVIOUS_KEYS' . '=' . $app_previous_keys,
        //     'APP_PREVIOUS_KEYS' . '=' . $app_key,
        //     // 'APP_PREVIOUS_KEYS' . '=' . env('APP_PREVIOUS_KEYS'),
        //     // 'APP_PREVIOUS_KEYS' . '=' . env('APP_KEY'),
        //     file_get_contents(app()->environmentFilePath())
        // ));
        // // dump(env('APP_PREVIOUS_KEYS'));

        // Artisan::call('key:generate');
        // return;

        // ? test create secret and delete secret expired date
        // $startData = Carbon::now();
        // for ($i = 0; $i < 10; $i++) {
        //     $secret_text = 'Hi';
        //     $secret_encrypt = Crypt::encryptString($secret_text);
        //     $secret_key = $this->generateUniqueString(30);
        //     $secret_hash = Hash::make($secret_text);
        //     $secret_passphrase = null;
        //     $email_notification = null;
        //     $secret_ttl = 86400;
        //     $deleted = Carbon::now()->addSeconds($secret_ttl);


        //     $secretData = [
        //         'text' => $secret_encrypt,
        //         'key' => $secret_key,
        //         'hash' => $secret_hash,
        //         'passphrase' => $secret_passphrase,
        //         'email_notification' => $email_notification,
        //         'ttl' => $secret_ttl,
        //         'deleted_at' => $deleted,
        //     ];

        //     Secret::create($secretData);
        // }
        // for ($i = 0; $i < 10; $i++) {
        //     $secret_text = 'Hi';
        //     $secret_encrypt = Crypt::encryptString($secret_text);
        //     $secret_key = $this->generateUniqueString(30);
        //     $secret_hash = Hash::make($secret_text);
        //     $secret_passphrase = null;
        //     $email_notification = null;
        //     $secret_ttl = 86400;
        //     $deleted = Carbon::now()->subDays(3);


        //     $secretData = [
        //         'text' => $secret_encrypt,
        //         'key' => $secret_key,
        //         'hash' => $secret_hash,
        //         'passphrase' => $secret_passphrase,
        //         'email_notification' => $email_notification,
        //         'ttl' => $secret_ttl,
        //         'deleted_at' => $deleted,
        //     ];

        //     Secret::create($secretData);
        // }


        // $endDate = Carbon::now();
        // echo $startData->diffInSeconds($endDate);

        // dump(Secret::all());
        // $this->secretBackendService->deleteSecretsExpiredData();
        // return;


        // ? test create users account and change account expired date default account
        // $planBasic = Plan::where('slug', 'basic')->where('is_active', 1)->first();
        // $planPremium = Plan::where('slug', 'premium-month')->where('is_active', 1)->first();


        // $startData = Carbon::now();
        // for ($i = 0; $i < 10; $i++) {
        //     $data = [
        //         'email' => 'test' . $i + 1 . '@test.com',
        //         'password' => Hash::make('1111111111'),
        //     ];

        //     $user = User::create($data);

        //     $account = new Account([
        //         'starts_at' => Carbon::now()->subMonths(3),
        //     ]);

        //     $account->user()->associate($user);
        //     $account->plan()->associate($planBasic);
        //     $account->save();
        // }

        // for ($i = 10; $i < 20; $i++) {
        //     $data = [
        //         'email' => 'test' . $i + 1 . '@test.com',
        //         'password' => Hash::make('1111111111'),
        //     ];

        //     $user = User::create($data);

        //     $account = new Account([
        //         'starts_at' => Carbon::now()->subMonths(2),
        //         'ends_at' => Carbon::now()->subMonths(2)->addMonths($planPremium->paid_period),
        //     ]);

        //     $account->user()->associate($user);
        //     $account->plan()->associate($planPremium);
        //     $account->save();
        // }



        // // $this->accountBackendService->changeAccountsExpiredDate();

        // $endDate = Carbon::now();

        // echo $startData->diffInSeconds($endDate);


        // return;

        // $p1 = Hash::make('   ');

        // dump($p1);

        // $res = Hash::check('   ', $p1);
        // dump($res);
        // return;
        // $user = User::find(2);
        // $planPremium = Plan::find(3);
        // $account = $user->account;
        // // dump($account);
        // // dd($planPremium);

        // // dump($account);
        // $account->plan()->associate($planPremium);
        // $account->starts_at = Carbon::now();
        // // $ends_at = Carbon::now();
        // // if ($planPremium->paid_interval == 'month') {
        // //     $ends_at->addMonths($planPremium->paid_period);
        // // }
        // // if ($planPremium->paid_interval == 'day') {
        // //     $ends_at->addDays($planPremium->paid_period);
        // // }

        // $account->ends_at = Carbon::now()->addMonths($planPremium->paid_period);
        // $account->update();
        // // dump($planPremium);
        // dump($account);

        // $this->accountBackendService->setDefaultAccount($user);
        // dump($user->account);

        // $this->accountBackendService->setPremiumAccount($user, $planPremium);
        // dump($user->account);
        // return;
        // ? setDefaultAccounts

        // dd(Carbon::now(Carbon::now()->addDay(3)->diffInSeconds(Carbon::now()))->timestamp);

        // ? create new secret
        // $secretData = [
        //     'text' => '7 text',
        //     'key' => 'asd4sd5sd5dsf5d5s5regtret5etert1',
        //     'hash' => 'sdokwerwer78wERRRRR898df9g89dfg',
        //     'passphrase' => false,
        //     'notice' => false,
        //     'ttl' => 259200,
        //     'deleted_at' => Carbon::now()->addSecond(259200),
        // ];

        // $secret = Secret::create($secretData);
        // dd($secret);

        // ? send ifo secret
        // $secret = Secret::create($secretData);
        // $secret = false;


        // if ($secret) {
        //     $dt = Carbon::now();
        //     $currentTimesamp = $dt->getTimestamp();
        //     $created = Carbon::parse($secret->created_at)->getTimestamp();
        //     $deleted = Carbon::parse($secret->deleted_at)->getTimestamp();
        //     $ttl = Carbon::create($secret->created_at)->diffInSeconds(Carbon::create($secret->deleted_at));

        //     $new_date = $dt->addSeconds(259200)->getTimestamp();
        //     $new_ttl = $new_date - $created;


        //     $data = [

        //     ];

        //     return response()->json($data);
        // }



        // $secret = Secret::find(26);

        // $created_at = Carbon::parse($secret->created_at);
        // $deleted_at = Carbon::parse($secret->deleted_at);

        // dd($created_at, $deleted_at);

        // dd($created_at->diffInSeconds($deleted_at));

        // dd($secret);

        // dd(Carbon::parse('2025-04-15 05:08:30')->getTimestamp());

        // $dt = Carbon::create(2025, 4, 15, 9, 11, 35);
        // $dtOld = Carbon::create(2025, 4, 12, 9, 11, 35);
        // $dtNew = Carbon::create(2025, 4, 18, 9, 11, 35);

        // $data = [
        //     'dt' => $dt,
        //     'dtOld' => $dtOld,
        //     'dtNow' => $dtNew,
        //     'dt_timesamp' => $dt->getTimestamp(),
        //     'dtOld_timesamp' => $dtOld->getTimestamp(),
        //     'dtNew_timesamp' => $dtNew->getTimestamp(),
        //     'diff_old_dt' => $dt->diffInSeconds($dtOld),
        //     'diff_dt_new' => $dt->diffInSeconds($dtNew),
        //     'ttl_old' => $dtOld->diffInSeconds($dt),
        //     'ttl_new' => $dt->diffInSeconds($dtNew),
        //     'carbone_create' => Carbon::parse('2025-04-15 05:08:30')->getTimestamp(),
        //     'carbone_old_del' => Carbon::parse('2025-04-12 05:08:30')->getTimestamp(),
        //     'carbone_diff_old_create' => Carbon::parse('2025-04-12 05:08:30')->diffInSeconds(Carbon::parse('2025-04-15 05:08:30')),
        //     'carbone_diff_create_new' => Carbon::parse('2025-04-15 05:08:30')->diffInSeconds(Carbon::parse('2025-04-18 05:08:30')),
        // ];

        // return response()->json($data);

        // return 'Error create secret';

        // ? delete old secrets
        // $currentData = Carbon::create(2025, 4, 18, 5, 10, 15);
        // $secrets = Secret::where('deleted_at', '<', $currentData)->get();
        // dd($secrets);
        // dd(md5(uniqid(mt_rand())));


        // $collection = collect(['a', 'b', 'a', 'c', 'b']);

        // dd($collection->duplicates());

        // [2 => 'a', 4 => 'b']
        // $collection = collect([
        //     'p4m7gnykam',
        //     'pfoebi0z8t',
        //     'hdf6vheaoi',
        //     'vgzgxgdkav',
        //     'si9mlhtfoh',
        // ]);

        // dd($collection->duplicates());

        // for ($i = 0; $i < 1000; $i++) {
        //     echo "'" . str(str()->random(4))->lower() . "', ";
        // }

        // return;



        // dd(str(str()->random(30))->lower());


        // dd(
        //     str(str()->random(17))->lower() . uniqid(),
        //     uniqid() . str(str()->random(17))->lower(),
        //     str(str()->random(30))->lower(),
        //     uniqid(),
        //     md5(uniqid(mt_rand()))
        // );

        // dd(Hash::make('dd'), Hash::make('dd'));
        // // dd(bcrypt('dd'), Hash::make('dd'));
        // // dd(uniqid());

        // dd(uniqid() . str(str()->random(12))->lower());

        // // ?
        // // ?
        // // ? 1yb23e  2jk6btjk
        // // ?
        // // ?

        // dd(uniqid());

        // dd(str(str()->random(17))->lower() . uniqid());

        // dd(uniqid());
        // dd(Str::ulid());

        // // dd(str()->ulid());

        // $key = str(str()->random(30))->lower();
        // dd($key);




        // public static function random($length = 16)
        // {
        //     return (static::$randomStringFactory ?? function ($length) {
        //         $string = '';

        //         while (($len = strlen($string)) < $length) {
        //             $size = $length - $len;

        //             $bytesSize = (int) ceil($size / 3) * 3;

        //             $bytes = random_bytes($bytesSize);

        //             $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        //         }

        //         return $string;
        //     })($length);
        // }




        // ? test unique db


        // $key = $this->generateUniqueString($len = 30);


        // $secretData = [
        //     'text' => 'Test text',
        //     'key' => $key,
        //     'hash' => 'sdokwerwer78wERRRRR898df9g89dfg',
        //     // 'passphrase' => false,
        //     // 'notice' => false,
        //     'ttl' => 259200,
        //     'deleted_at' => Carbon::now()->addSecond(259200),
        // ];

        // Secret::create($secretData);

        // echo $key;
        // $arr = [];

        // dd(!empty($arr));


        // $plan = Plan::with('lifespans')->find(1);
        // dd($plan->lifespans->isNotEmpty());

        // foreach ($plan->lifespans as $lifespan) {
        //     echo $lifespan . '<br>';
        // }


        // ? create hash  and check hash

        // $hash = Hash::make('ddd');
        // echo $hash . '<br>';
        // $validHash = Hash::check('ddd', $hash);
        // dd($validHash);

        // ? create hash  and check hash



        return;
        // dd($key);
    }


    public function generateUniqueString($len = 10, $num = 0)
    {
        // $key = $num == 0 ?  'tt' : 'tt' . $num;
        $key = $num == 0 ?  str(str()->random($len))->lower() : str(str()->random($len))->lower() . $num;

        $data = ['key' => $key,];

        $num++;

        $rules = ['key' => 'unique:secrets'];

        $validate = Validator::make($data, $rules)->passes();

        return $validate ? $data['key'] : $this->generateUniqueString($len, $num);
    }
}
