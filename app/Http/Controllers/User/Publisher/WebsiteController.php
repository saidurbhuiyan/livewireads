<?php

namespace App\Http\Controllers\User\Publisher;


use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {

        //$website = new WebsiteClass(Auth::id());
        return view('user.publisher.website.show');

    }

}
