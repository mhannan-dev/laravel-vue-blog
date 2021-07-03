<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::latest()->get();
        return response()->json($categories, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:categories,title',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::create([
            'title' => $request->title,
            'image' => $request->image
        ]);

        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/category'), $imageName);
            $category->image = '/storage/category/' . $imageName;
            $category->save();
        }
        return response()->json($category, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     dd($id);
    //     $category = Category::findOrFail($id);
    //     return response()->json($category, 200);
    // }
    public function edit(Category $category)
    {
        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => "required|max:255|unique:categories,title, $category->id",
            'image' => 'sometimes|nullable|image|max:2048',
        ]);

        $category->update([
            'title' => $request->title
        ]);

        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/category'), $imageName);
            $category->image = '/storage/category/' . $imageName;
            $category->save();
        } else {
            $imageName = $category->image;
        }
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Working  code to delete Category with image
        if ($category) {
            $image = $category->image;
            $imagePath = public_path($image);
            if ($image && file_exists($imagePath)) {
                unlink($imagePath);
            }
            $category->delete();
        } else {
            return response()->json('Category not found.', 404);
        }

    }
}
