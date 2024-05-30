<?php

namespace App\Http\Controllers\User\Publisher;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {

        //$website = new WebsiteClass(Auth::id());
        return view('user.publisher.app.show');

    }
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {

        return view('user.publisher.app.create' );
    }


    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.publisher.app.edit',['site_id' => $id]);
    }




}
