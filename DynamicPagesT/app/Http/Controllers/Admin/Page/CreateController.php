<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AbstractController;

/**
 * Class CreateController
 * @package App\Http\Controllers\admin\page
 */
class CreateController extends AbstractController implements Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        return view('pages.create');
    }
}
