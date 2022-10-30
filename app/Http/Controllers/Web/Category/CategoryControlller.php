<?php

namespace App\Http\Controllers\Web\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryControlller extends Controller
{
    public function edit($id)
    {
        $oldCategory = Category::where('id', $id)->first();
        $categories = Category::where('user_id', Auth::user()->id)->paginate(5);
        $allCategories = Category::limit(9)->get();
        return view('category.edit-category', compact('oldCategory', 'categories', 'allCategories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $category->update([
            'name' => $request->name
        ]);
        return redirect('/category')->with('message', 'Success Edit Category!');
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::user()->id)->paginate(5);
        $allCategories = Category::limit(9)->get();
        return view('category.add-category', compact('categories', 'allCategories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/category')->with('message', 'Success Create Category!');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/category')->with('message', 'Success Delete Category!');
    }
}
