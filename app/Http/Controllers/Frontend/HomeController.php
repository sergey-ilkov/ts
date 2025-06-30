<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Lifespan;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Secret;
use App\Models\User;
use App\Services\Frontend\AccountService;
use App\Services\Frontend\UserService;
use function Laravel\Prompts\select;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    protected $accountService;


    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }


    public function index()
    {

        $user = Auth::guard('web')->user();

        $product = null;

        if ($user) {

            $product = $user->account->plan->product;
        } else {

            $product = Product::with('lifespans')->where('slug', 'anonymous')->find(1);
        }

        $page = 'home';

        return view('frontend.home.index', compact('product', 'page'));
    }
}