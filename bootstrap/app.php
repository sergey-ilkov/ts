<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix(env('APP_ADMIN_PANEL'))
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {

        // $middleware->redirectGuestsTo(function (Request $request) {
        //     $currentRoute = $request->route()->getName();
        //     if ($currentRoute === 'admin.home') {
        //         return route('admin.login');
        //     }
        // });

        $middleware->redirectGuestsTo('/');
    })
    ->withExceptions(function (Exceptions $exceptions) {

        //
        $exceptions->respond(function (Response $response) {
            if ($response->getStatusCode() === 419) {
                return response()->json([
                    'message' => __('messages.csrf_token_mismatch')
                ], 419);
            }
            if ($response->getStatusCode() === 429) {
                return response()->json([
                    'message' => __('messages.too_many_attempts')
                ], 429);
            }

            return $response;
        });
    })->create();