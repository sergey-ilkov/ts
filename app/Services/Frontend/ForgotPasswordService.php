<?php

namespace App\Services\Frontend;

use Exception;
use App\Models\User;
use App\Mail\SendPasswordLink;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordService
{
    /**
     * Create a new class instance.
     */
    protected $channel;
    protected $blockingUserService;

    public function __construct(BlockingUserService $blockingUserService)
    {
        //
        $this->blockingUserService = $blockingUserService;


        $this->channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/secret.log'),
        ]);
    }

    public function sendLink($request)
    {
        // ? check table blocking
        $type = 'password-reset';
        $userBlocking = $this->blockingUserService->isBlocked($type);
        if ($userBlocking) {
            $this->blockingUserService->createOrUpdateBlockedUser($type);
            $error = [
                "status" => "error",
                'errors' => [
                    'pass-reset' => "Перевищено кількість невдалих спроб. <br> З метою безпеки відновлення паролю на сьогодні заблоковано.",
                ]
            ];
            return response()->json($error);
        }
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = strip_tags($request->email);

        $user = User::where('email', $email)->first();

        if (!$user) {
            // ? add user table blocking
            $this->blockingUserService->createOrUpdateBlockedUser($type);

            $error = [
                "status" => "error",
                'errors' => [
                    'email' => __('messages.email_not_registered'),
                ]
            ];
            return response()->json($error);
        }

        $token = str(str()->random(64))->lower();

        DB::table('password_reset_tokens')->where(['email' => $email])->delete();


        $resetPassword = DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        if (!$resetPassword) {
            $error = [
                "status" => "error",
                'errors' => [
                    'forgot' => __('messages.forgot_error_occurred'),
                ]
            ];
            return response()->json($error);
        }

        $sendMail = null;

        try {
            $data = [
                'token' => $token,
            ];

            // ? send email
            $sendMail = Mail::to($email)->send(new SendPasswordLink($data));


            $sendMail = true;
        } catch (Exception $ex) {

            Log::stack([$this->channel])->error('Error send email forgot password: ', ['error' => $ex->getMessage()]);
        }

        if ($sendMail) {
            $res = [
                "status" => "ok",
                'sendMail' => $sendMail,

            ];
            return response()->json($res);
        }

        DB::table('password_reset_tokens')->where(['email' => $email])->delete();


        $errors = [
            "status" => "error",
            'sendMail' => $sendMail,
            'errors' => [
                'send-email' => __('messages.error_sending_email'),
            ]
        ];
        return response()->json($errors);
    }

    public function passwordReset($request)
    {
        $request->validate([
            'password' => 'required|string|min:10',
            'email' => 'required|email',
            'token_forgot' => 'required|string',
        ]);

        $email = strip_tags($request->email);
        $token_forgot = strip_tags($request->token_forgot);

        // ? check table blocking
        $type = 'password-reset';
        $userBlocking = $this->blockingUserService->isBlocked($type);
        if ($userBlocking) {
            $this->blockingUserService->createOrUpdateBlockedUser($type);

            DB::table('password_reset_tokens')->where(['token' => $token_forgot])->delete();

            $error = [
                "status" => "error",
                'errors' => [
                    'pass-reset' => "З метою безпеки відновлення паролю на сьогодні заблоковано.",
                ]
            ];
            return response()->json($error);
        }



        $tokenReset = DB::table('password_reset_tokens')->where(['email' => $email, 'token' => $token_forgot])->first();
        if (!$tokenReset) {
            // ? add user table blocking
            $this->blockingUserService->createOrUpdateBlockedUser($type);

            DB::table('password_reset_tokens')->where(['token' => $token_forgot])->delete();

            $errors = [
                "status" => "error",
                'errors' => [
                    'email_token' => __('messages.error_forgot'),
                ]
            ];
            return response()->json($errors);
        }

        if (Carbon::parse($tokenReset->created_at)->addMinutes(5) < Carbon::now()) {

            DB::table('password_reset_tokens')->where(['token' => $token_forgot])->delete();

            $errors = [
                "status" => "error",
                'errors' => [
                    'email_token' => __('messages.error_token_expires'),
                ]
            ];
            return response()->json($errors);
        }

        DB::table('password_reset_tokens')->where(['token' => $token_forgot])->delete();

        $user = User::where('email', $email)->first();

        if (!$user) {

            $errors = [
                "status" => "error",
                'errors' => [
                    'email' => __('messages.error_forgot'),
                ]
            ];
            return response()->json($errors);
        }

        $user->update(['password' => bcrypt($request->password)]);

        $res = [
            "status" => "ok",
            'pass-reset' => true,
        ];
        return response()->json($res);
    }
}
