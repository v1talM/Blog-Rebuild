<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Overtrue\Pinyin\Pinyin;


class AdminController extends Controller
{
    private $article;
    private $category;
    private $nav;
    public function __construct(Article $article, Category $category)
    {
        $this->article = $article;
        $this->category = $category;
        $this->nav = [
            '文章列表' => route('admin.article')
        ];
    }

    public function index()
    {
        $nav = json_encode($this->nav);
        return redirect()->route('admin.article');
    }

    public function articles()
    {
        $articles = $this->article->select('id', 'title', 'excerpt', 'published_at', 'thumbnail', 'category_id')
            ->with('category')
            ->orderBy('id', 'desc')
            ->get()
            ->toJson();
        return view('admin.article', compact('articles'));
    }

    public function create()
    {
        $categories = $this->category->all()->toJson();
        return view('admin.article-create', compact('categories'));
    }

    public function store(Request $request, Pinyin $pinyin)
    {
        $article = $request->input('data');
        $res = $this->article->create([
            'title' => $article['title'],
            'slug' => $pinyin->permalink($article['title']),
            'thumbnail' => $article['thumbnail'] ?? 'https://picsum.photos/600/800?image=' . rand(1, 100),
            'category_id' => $article['category_id'],
            'published_at' => date("Y-m-d H:i:s", strtotime($article['published_at'])),
            'origin_content' => $article['origin_content'],
            'content' => $article['content'],
            'excerpt' => mb_strcut($article['content'],0,512)
        ]);
        if ($res) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'fail']);
    }

    public function edit($id)
    {
        $article = $this->article->findOrFail($id)->toJson();
        $categories = $this->category->select('id', 'name', 'description')->get()->toJson();
        return view('admin.article-edit', compact('article', 'categories'));
    }

    public function update(Request $request)
    {
        $input = $request->input('data');
        $id = $input['id'];
        $title = $input['title'];
        $category_id = $input['category_id'];
        $published_at = $input['published_at'];
        $is_public = $input['is_public'];
        $origin_content = $input['origin_content'];
        $content = $input['content'];
        $article = $this->article->find($id);
        if ($article) {
            $article->category_id = $category_id;
            $article->published_at = date('Y-m-d H:i:s', strtotime($published_at));
            $article->is_public = $is_public;
            $article->origin_content = $origin_content;
            $article->content = $content;
            $article->update();
        }
        return response()->json(['status' => 'success']);
    }

    public function delete($id)
    {
        $article = $this->article->find($id);
        if ($article) {
            $article->delete();
        }
        return response()->json(['status' => 'success']);
    }
}
