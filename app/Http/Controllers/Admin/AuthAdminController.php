<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AuthAdminService;
use App\Services\Frontend\BlockingUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    //

    protected $typeBlocked = 'admin';
    protected $blockingUserService;

    public function  __construct(BlockingUserService $blockingUserService)
    {
        //
        $this->blockingUserService = $blockingUserService;
    }

    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }

        $blocked = $this->blockingUserService->isBlocked($this->typeBlocked);

        if ($blocked) {
            return view('admin.auth.login')->with('blocked', 'the user is blocked');
        }


        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $blocked = $this->blockingUserService->isBlocked($this->typeBlocked);

        if ($blocked) {
            return view('admin.auth.login')->with('blocked', 'the user is blocked');
        }

        $validation = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],

        ]);


        $data = clearTags($validation);


        if (Auth::guard('admin')->attempt($data)) {


            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }

        $this->blockingUserService->createOrUpdateBlockedUser($this->typeBlocked);

        return back()->withErrors([
            'error' => 'wrong login or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
