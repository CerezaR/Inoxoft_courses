<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request)
    {
        $this->validate(request(), [
            'page_title' => 'required|string|max:100',
            'status' => 'required',
            'position' => 'required|integer',
            'use' => 'required',
            'url' => 'required|unique:pages|string|max:100',
            'meta_title' => 'required|string|max:100',
            'meta_description' => 'required|string|max:500',
            'meta_keywords' => 'required|string|max:500',
            'body' => 'required',
        ]);

        $page = new Page();
        $page->title = $request->page_title;
        if($request->status === "enable")
            $page->status = true;
        else
            $page->status = false;
        $page->position = $request->position;
        if($request->use === "yes")
            $page->use_in_main_menu = true;
        else
            $page->use_in_main_menu = false;
        $page->url = $request->url;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->page_body = $request->body;
        $page->save();
        return view('admin.home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read() {
        $pages = Page::all()->toArray();
        return view('pages.show', compact('pages'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id) {
        DB::table('pages')->where('id', $id)->delete();
        $pages = Page::all()->toArray();
        return view('pages.show', compact('pages'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        $page = Page::find($id);
        return view('pages.edit', compact('page'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'page_title' => 'string|max:100|nullable',
            'position' => 'integer|nullable',
            'url' => 'unique:pages|string|max:100|nullable',
        ]);
        $page = Page::find($id);
        if(!is_null($request->page_title))
            $page->title = $request->page_title;
        if(!is_null($request->status)) {
            if($request->status === "enable")
                $page->status = true;
            else
                $page->status = false;
        }
        if(!is_null($request->position))
            $page->position = $request->position;
        if(!is_null($request->url))
            $page->url = $request->url;
        $page->save();
        $pages = Page::all()->toArray();
        return view('pages.show', compact('pages'));
    }
}
