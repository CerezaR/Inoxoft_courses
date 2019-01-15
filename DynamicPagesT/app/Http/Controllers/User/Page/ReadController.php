<?php

namespace App\Http\Controllers\User\Page;

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Controller;
use App\Page;

class ReadController extends AbstractController implements Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function execute()
    {
        $pages = Page::all()->toArray();
        usort($pages, array($this, 'myComparator'));
        return view('home', compact('pages'));
    }

    /**
     * @param array $a
     * @param array $b
     * @return mixed
     */
    private function myComparator(Array $a, Array $b)
    {
        return $a['position'] - $b['position'];
    }
}
