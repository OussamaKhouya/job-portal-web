<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CandidateDashboardController extends Controller
{
    function index(): View {
        return view('frontend.candidate-dashboard.dashboard');
    }
}