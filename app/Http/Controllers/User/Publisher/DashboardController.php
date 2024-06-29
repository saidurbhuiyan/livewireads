<?php

namespace App\Http\Controllers\User\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{

    /**
     * user dashboard
     * @return View
     */
    public function index(): View
    {
        return view('user.publisher.dashboard');

    }
}
