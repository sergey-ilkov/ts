<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blocking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Services\Frontend\SecretService;

class SecretController extends Controller
{
    //

    public $secretService;

    public function __construct(SecretService $secretService)
    {
        $this->secretService = $secretService;
    }


    public function store(Request $request)
    {

        return $this->secretService->createSecret($request);
    }


    public function show($key)
    {



        $secret = $this->secretService->getSecret($key);

        $page = 'secret';

        return view('frontend.secret.index', compact('page', 'key', 'secret'));
    }

    public function showDelete(Request $request, $key)
    {

        return $this->secretService->showDeleteSecret($request, $key);
    }
}