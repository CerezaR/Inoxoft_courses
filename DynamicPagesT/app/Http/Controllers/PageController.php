<?php

namespace App\Http\Controllers;

use App\Page;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function read() {
        $pages = Page::all()->toArray();
        usort($pages, array($this, 'myComparator'));
        return view('home', compact('pages'));
    }

    /**
     * @param Page $a
     * @param Page $b
     * @return mixed
     */
    function myComparator($a, $b) {
        return $a['position'] - $b['position'];
    }
}
