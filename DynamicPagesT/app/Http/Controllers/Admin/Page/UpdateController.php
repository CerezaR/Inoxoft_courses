<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Controllers\AbstractController;
use App\Page;

/**
 * Class UpdateController
 * @package App\Http\Controllers\admin\page
 */
class UpdateController extends AbstractController
{
    /**
     * @param UpdatePageRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute(UpdatePageRequest $request, int $id)
    {
        $page = Page::find($id);
        if (!is_null($request->page_title)) {
            $page->title = $request->page_title;
        }
        if (!is_null($request->status)) {
            if ($request->status === "enable") {
                $page->status = true;
            } else {
                $page->status = false;
            }
        }
        if (!is_null($request->position)) {
            $page->position = $request->position;
        }
        if (!is_null($request->url)) {
            $page->url = $request->url;
        }
        $page->save();
        $pages = Page::all()->toArray();
        return view('pages.show', compact('pages'));
    }
}
