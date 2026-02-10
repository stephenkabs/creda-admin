<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompleteController extends Controller
{
    public function index()
    {
        // Mark onboarding as completed
        auth()->user()->update([
            'onboarding_completed_at' => now(),
        ]);

        return view('onboarding.setup.complete');
    }
}
