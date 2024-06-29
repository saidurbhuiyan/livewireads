<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ShortLinkController extends Controller
{

    /**
     * shortlink management
     * @return View
     */
    public function show(): View
    {
        return view('admin.shortlink.show');

    }

    /**
     * create new shortlink
     * @return View
     */
    public function create(): View
    {
        return view('admin.shortlink.create');

    }

    /**
     * edit shortlink
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('admin.shortlink.edit',['short_link_id'=> $id]);

    }
}
