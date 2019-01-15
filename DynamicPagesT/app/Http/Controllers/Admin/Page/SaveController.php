<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AbstractController;
use App\Http\Requests\SavePageRequest;
use App\Page;

/**
 * Class SaveController
 * @package App\Http\Controllers\admin\page
 */
class SaveController extends AbstractController
{
    /**
     * @param SavePageRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(SavePageRequest $request)
    {
        $page = new Page();
        $page->title = $request->page_title;
        if ($request->status === "enable") {
            $page->status = true;
        } else {
            $page->status = false;
        }
        $page->position = $request->position;
        if ($request->use === "yes") {
            $page->use_in_main_menu = true;
        } else {
            $page->use_in_main_menu = false;
        }
        $page->url = $request->url;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->page_body = $request->body;
        $page->save();
        return view('admin.home');
    }
}
