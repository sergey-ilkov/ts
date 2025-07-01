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

        dump($request->all());
        return;
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
