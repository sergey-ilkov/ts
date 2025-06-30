<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Frontend\AuthUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{

    protected $authUserService;


    public function __construct(AuthUserService $authUserService)
    {
        $this->authUserService = $authUserService;
    }


    public function register(Request $request)
    {

        return $this->authUserService->register($request);
    }


    public function login(Request $request)
    {
        return $this->authUserService->login($request);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}