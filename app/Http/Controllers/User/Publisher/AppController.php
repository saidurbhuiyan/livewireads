<?php

namespace App\Http\Controllers\User\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AppController extends Controller
{

    /**
     * user app
     * @return View
     */
    public function show(): View
    {
        //$website = new WebsiteClass(Auth::id());
        return view('user.publisher.app.show');

    }

    /**
     * user app create
     * @return View
     */
    public function create(): View
    {
        return view('user.publisher.app.create' );
    }


    /**
     * user app edit
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('user.publisher.app.edit',['site_id' => $id]);
    }




}
