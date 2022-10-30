<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Get All Categories
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $categories
        ]);
    }

    // Create Category
    public function store(CategoryRequest $request)
    {
        $category = auth()->user()->categories()->create([
            'name' => $request->name
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success Create Category!',
            'data' => $category
        ]);
    }

    // Show Detail Category
    public function show($id)
    {
        $category = Category::find($id);

        if($category)
        {
            $category->first();
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $category
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'The Category Not Found!'
        ]);
    }

    // Update Category
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->first();

        if($category)
        {
            $category->update([
                'name' => $request->name
            ]);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Success Update Category!'
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'Failed Update Category!'
        ]);
    }

    // Delete Category
    public function destroy($id)
    {
        if(Category::destroy($id))
        {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Success Delete Category!'
            ]);
        }

        return response()->json([
            'success' => false,
            'code' => 400,
            'message' => 'Failed Delete Category!'
        ]);
    }
}
