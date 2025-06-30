<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Services\Frontend\FeedbackService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected $feedbackService;


    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function index()
    {

        $page = 'feedback';

        return view('frontend.feedback.index', compact('page'));
    }

    public function message(Request $request)
    {

        return $this->feedbackService->message($request);
    }
}