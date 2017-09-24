<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::select('id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt', 'category_id')
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->get()
            ->toJson()
            ;
        return view('home', compact('articles'));
    }
}