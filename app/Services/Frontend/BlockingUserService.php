<?php

namespace App\Services\Frontend;

use App\Models\Blocking;
use Illuminate\Http\Request;

class BlockingUserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getUser($type)
    {

        $ip = request()->ip();

        // if ($type == 'admin') {
        //     $user = Blocking::where('ip', $ip)
        //         ->where('type', $type)
        //         ->first();

        //     return $user;
        // }

        // $user = Blocking::where('ip', $ip)
        //     ->where('type', $type)
        //     ->whereDate('created_at', now()->format('Y-m-d'))
        //     ->first();

        $query = Blocking::where('ip', $ip)->where('type', $type);

        if ($type != 'admin') {
            $query->whereDate('created_at', now()->format('Y-m-d'));
        }

        $user = $query->first();

        return $user;
    }

    public function isBlocked($type)
    {
        $user = $this->getUser($type);

        if ($user && $user->blocking) {
            return true;
        }
        return false;
    }

    public function createOrUpdateBlockedUser($type)
    {
        $user = $this->getUser($type);

        if (!$user) {
            $ip = request()->ip();
            $user = Blocking::query()->create([
                'ip' => $ip,
                'count' => 1,
                'type' => $type,
                'blocking' => false,
            ]);
        } else {
            $user->increment('count');

            if ($type == 'secret' && $user->count >= env('BLOCKING_SECRET_SHOW')) {
                $user->update(['blocking' => true]);
            }
            if ($type == 'user-login' && $user->count >= env('BLOCKING_USER_LOGIN')) {
                $user->update(['blocking' => true]);
            }
            if ($type == 'user-register' && $user->count >= env('BLOCKING_USER_REGISTER')) {
                $user->update(['blocking' => true]);
            }
            if ($type == 'password-reset' && $user->count >= env('BLOCKING_PASSWORD_RESET')) {
                $user->update(['blocking' => true]);
            }
            if ($type == 'feedback' && $user->count >= env('BLOCKING_FEEDBACK')) {
                $user->update(['blocking' => true]);
            }
            if ($type == 'admin' && $user->count >= env('BLOCKING_ADMIN_PANEL')) {
                $user->update(['blocking' => true]);
            }
        }

        return $user;
    }
}