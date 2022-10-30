<?php

namespace App\Http\Controllers\API\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Get All Articles
    public function index()
    {
        $articles = Article::with('user')
                    ->with('category')
                    ->paginate(2);
        
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $articles
        ]);
    }

    // Create Article
    public function store(ArticleRequest $request)
    {
        $category = Category::find($request->category_id);

        if(!$category)
        {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'The Category Not Found!'
            ]);
        }

        if($category->user_id != auth()->user()->id)
        {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'User ID in the category is not the same as Authentication User ID!'
            ]);
        }
        
        $article = auth()->user()->articles()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->file('image')->store('images', 'public'),
            'category_id' => $request->category_id
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success Create Article!',
            'data' => $article
        ]);
    }

    // Show Detail Article
    public function show($id)
    {
        $article = Article::find($id);
        
        if($article)
        {
            $article = $article->with('user')
                    ->with('category')
                    ->first();
    
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $article
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'The Article Not Found!'
        ]);
    }

    // Update Article
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::where('id', $id)->first();

        if($article)
        {
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

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Success Update Article!'
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'Failed Update Article!'
        ]);
    }

    // Delete Article
    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();

        if($article)
        {
            Storage::delete('/public/' . $article->image); //Delete Article Image from Storage
            Article::destroy($id);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Success Delete Article!'
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'Failed Delete Article!'
        ]);
    }
}
