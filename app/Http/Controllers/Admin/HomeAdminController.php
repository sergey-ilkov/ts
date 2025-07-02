<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Secret;
use App\Models\Blocking;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{
    //
    public function index()
    {
        // echo  'user: ' . Auth::guard('web')->user() . '<br>';
        // echo  'admin: ' . Auth::guard('admin')->user() . '<br>';

        // if (Auth::user()) {
        //     echo  '<a href="' . route('admin.logout') . '">Logout admin</a>';
        // }

        // return;
        $info = [];

        $blockings = Blocking::where('blocking', true)->count();
        $info['blockings'] = $blockings;

        $users = User::count();
        $info['users'] = $users;

        $admins = Admin::count();
        $info['admins'] = $admins;

        $feedback = Feedback::count();
        $info['feedback'] = $feedback;



        // DB::select("SET information_schema_stats_expiry = 0");
        // $secrets_db = DB::select("SHOW TABLE STATUS LIKE 'secrets'");
        // dump($secrets_db);
        // $secrets = Secret::all();
        // $info['secrets'] = [
        //     'current_total' => $secrets->count(),
        //     'all_total' => $secrets_db[0]->Auto_increment - 1,
        // ];

        $secrets = Secret::count();
        $info['secrets'] = $secrets;

        return view('admin.home.index', compact('info'));
    }
}