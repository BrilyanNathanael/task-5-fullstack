<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(request('category'))
        {
            $categories = Category::where('id', request('category'))->first();
            $articles = $categories->articles()->with('user')->with('category')->paginate(4);
        }
        else
        {
            $articles = Article::with('user')
                        ->with('category')
                        ->paginate(4);
        }

        $newArticle = Article::orderBy('created_at', 'DESC')
                        ->with('user')
                        ->with('category')
                        ->limit(2)
                        ->get();

        $allCategories = Category::limit(9)->get();
        return view('home', compact('articles', 'allCategories', 'newArticle'));
    }
}
