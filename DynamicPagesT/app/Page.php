<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class page
 * @package App
 */
class Page extends Model
{
    /**
     * @param $slug
     * @return Page mixed
     */
    public static function findBySlug($slug)
    {
        $pages = Page::all()->toArray();
        foreach ($pages as $page) {
            if ($page['url'] == $slug) {
                return $page;
            }
        }
    }
}
