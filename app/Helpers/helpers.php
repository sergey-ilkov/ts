<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



if (!function_exists('active_link')) {

    function active_link(string $name, string $class = 'active'): string
    {
        return  Route::is("$name*") ? $class : '';
    }
}

if (!function_exists('hasRole')) {

    function hasRole(string $role): bool
    {
        if (Auth::guard('admin')->user()) {

            return Auth::guard('admin')->user()->role === $role;
        }

        return false;
    }
}
if (!function_exists('clearTags')) {

    function clearTags(array $data): array
    {
        foreach ($data as $key => $value) {
            $data[$key] = strip_tags($value);
        }

        return $data;
    }
}

if (!function_exists('alert')) {

    function alert(string $value, string $type = 'success')
    {
        session(['alert' => $value, 'alert_type' => $type]);
    }
}
if (!function_exists('codeGenerator')) {

    function codeGenerator()
    {
        $numbers = '1234567890';
        $code = '';

        for ($y = 0; $y < 4; $y++) {

            $code .= $numbers[rand(0, strlen($numbers) - 1)];
        }

        return $code;
    }
}
