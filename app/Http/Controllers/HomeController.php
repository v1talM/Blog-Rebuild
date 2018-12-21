<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

class HomeController extends Controller
{
    private $article;
    private $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Article $article, Category $category)
    {
        $this->article = $article;
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = $this->article->select('id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt', 'category_id')
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->get()
            ->toJson()
            ;
        $category = $this->category->select('name')->get()->toJson();
        return view('home', compact('articles', 'category'));
    }

    public function article($slug)
    {
        $article = collect($this->article->where('slug', $slug)->with('category')->first())->toArray();
        if (empty($article)) {
            abort(404);
        }
        if ($article['is_public'] != 1) {
            abort(404);
        }
        return view('article', compact('article'));
    }

    public function category($category)
    {
        $cate = $this->category->select('slug', 'description')->where('slug', $category)->first();
        $articles = $this->article->select('id', 'title', 'slug', 'thumbnail', 'published_at', 'excerpt', 'category_id')
            ->whereHas('category', function ($query) use ($category){
                $query->where('slug', $category);
            })
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->get()
            ->toJson();
        return view('category', compact('cate', 'articles'));
    }

    public function webgl()
    {
        $articles = $this->article->select('id', 'title', 'slug', 'thumbnail','category_id')
            ->with('category')
            ->orderBy('published_at', 'desc')
            ->get()
            ->toJson();
        return view('webgl', compact('articles'));
    }
}
