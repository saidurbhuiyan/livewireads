<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class OfferWallController extends Controller
{

    /**
     * Render the offer wall manager view.
     * @return View
     */
    public function show(): View
    {

        return view('admin.offerwall.show');

    }

    /**
     * Render the offer wall create.
     * @return View
     */
    public function create(): View
    {
        return view('admin.offerwall.create');

    }

    /**
     * Render the offer wall edit.
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('admin.offerwall.edit',['offer_wall_id'=> $id]);

    }
}
