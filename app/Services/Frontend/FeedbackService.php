<?php

namespace App\Services\Frontend;

use App\Models\Feedback;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class FeedbackService
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

    public function message($request)
    {
        $request->validate([
            'message' => "required|string|between:1,2000",
        ]);

        // ? add and check table blocking 
        $type = 'feedback';
        $userBlocking = $this->blockingUserService->createOrUpdateBlockedUser($type);

        if (!$userBlocking->blocking) {
            // ? 5 message adddb
            $message = strip_tags($request->message);
            $ip = request()->ip();
            $email = null;

            $user = Auth::guard('web')->user();
            if ($user) {
                $email = $user->email;
            }
            $feedbackData = [
                'message' => $message,
                'ip' => $ip,
                'email' => $email,
            ];

            $feedback = Feedback::create($feedbackData);
        }

        $resData = [
            'status' => 'ok',
            'sendMessage' => true,
        ];

        return response()->json($resData);
    }
}