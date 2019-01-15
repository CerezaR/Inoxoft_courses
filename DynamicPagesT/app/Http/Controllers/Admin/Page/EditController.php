<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AbstractController;
use App\Page;

/**
 * Class EditController
 * @package App\Http\Controllers\admin\page
 */
class EditController extends AbstractController implements Controller
{
    /**
     * @param int|null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(int $id = null)
    {
        $page = Page::find($id);
        return view('pages.edit', compact('page'));
    }
}
