<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AbstractController;

/**
 * Class IndexController
 * @package App\Http\Controllers\admin\page
 */
class IndexController extends AbstractController implements Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        return view('admin.home');
    }
}
