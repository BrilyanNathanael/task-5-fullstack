<?php

namespace App\Http\Controllers\Web\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')
                    ->with('category')
                    ->paginate(4);

        $allCategories = Category::limit(9)->get();

        return view('article.list', compact('articles', 'allCategories'));
    }

    public function show($id)
    {
        $article = Article::where('id', $id)
                    ->with('user')
                    ->with('category')
                    ->first();
        
        $moreArticle = Article::limit(5)->get();

        $countArticles = Article::where('user_id', $article->user_id)
                        ->count();
        
        $allCategories = Category::limit(9)->get();

        return view('article.detail', compact('article', 'moreArticle', 'countArticles', 'allCategories'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get();

        $allCategories = Category::limit(9)->get();
        return view('article.write', compact('categories', 'allCategories'));
    }

    public function store(ArticleRequest $request)
    {
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->store('images', 'public'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category
        ]);

        return redirect('/article/list')->with('message', 'Success Create Article!');
    }

    public function edit($id)
    {
        $article = Article::where('id', $id)->first();
        $categories = Category::where('user_id', Auth::user()->id)->get();
        $allCategories = Category::limit(9)->get();
        return view('article.edit', compact('article', 'categories', 'allCategories'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::where('id', $id)->first();

        if($request->image)
        {
            Storage::delete('/public/' . $article->image); //Delete Old Article Image from Storage

            $article->update([
                'title' => $request->title,
                "content" => $request->content,
                "image" => $request->file('image')->store('images', 'public'), //Store New Image
                "category_id" => $request->category_id
            ]);
        }
        else
        {
            $article->update([
                'title' => $request->title,
                "content" => $request->content,
                "category_id" => $request->category_id
            ]);
        }

        return redirect('/article/list')->with('message', 'Success Edit Article!');
    }

    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        Storage::delete('/public/' . $article->image);
        Article::destroy($id);
        return redirect('/article/list')->with('message', 'Success Delete Article!');
    }

    public function search(Request $request)
    {
        $articles = Article::where('title', 'LIKE', '%' . request('title') . '%')->get();
        $input = request('title');
        $allCategories = Category::limit(9)->get();
        return view('article.search', compact('articles', 'input', 'allCategories'));
    }
}
