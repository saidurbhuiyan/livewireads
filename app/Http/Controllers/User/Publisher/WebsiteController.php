<?php

namespace App\Http\Controllers\User\Publisher;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class WebsiteController extends Controller
{

    /**
     * user publisher website
     * @return View
     */
    public function show(): View
    {

        //$website = new WebsiteClass(Auth::id());
        return view('user.publisher.website.show');

    }

}
