<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AbstractController;
use App\Page;

/**
 * Class ReadController
 * @package App\Http\Controllers\admin\page
 */
class ReadController extends AbstractController implements Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        $pages = Page::all()->toArray();
        return view('pages.show', compact('pages'));
    }
}
