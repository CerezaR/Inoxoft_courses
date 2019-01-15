<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AbstractController;
use Illuminate\Support\Facades\DB;
use App\Page;

/**
 * Class DeleteController
 * @package App\Http\Controllers\admin\page
 */
class DeleteController extends AbstractController implements Controller
{
    /**
     * @param int|null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(int $id = null)
    {
        DB::table('pages')->where('id', $id)->delete();
        $pages = Page::all()->toArray();
        return view('pages.show', compact('pages'));
    }
}
