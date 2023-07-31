<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Page;
use App\Models\Category;


class DashboardController extends Controller
{
    public function index(){
        $page = Page::all()->count();
        $article = Articles::all()->count();
        $category = Category::all()->count();
        return view('back.dashboard',compact('article','page','category'));
    }
}
