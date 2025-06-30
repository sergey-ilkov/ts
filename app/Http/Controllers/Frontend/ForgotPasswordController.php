<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendPasswordLink;
use App\Models\User;
use App\Services\Frontend\BlockingUserService;
use App\Services\Frontend\ForgotPasswordService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    //
    protected $channel;
    protected $forgotPasswordService;

    public function __construct(ForgotPasswordService $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
        $this->channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/password-reset.log'),
        ]);
    }

    public function  sendLinkPasswordReset(Request $request)
    {

        return $this->forgotPasswordService->sendLink($request);
    }

    public function  indexPasswordReset($token)
    {

        $page = 'pass-reset';

        return view('frontend.password.index', compact('page'), ['token' => $token]);
    }

    public function  submitPasswordReset(Request $request)
    {

        return $this->forgotPasswordService->passwordReset($request);
    }
}