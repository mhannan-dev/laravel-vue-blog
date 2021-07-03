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
            'icon_image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = Category::create([
            'title' => $request->title,
            'icon_image' => $request->icon_image
        ]);

        if ($request->icon_image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->icon_image->getClientOriginalExtension();
            $request->icon_image->move(public_path('storage/category'), $imageName);
            $category->icon_image = '/storage/category/' . $imageName;
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
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        return response()->json($Category, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        $this->validate($request, [
            'title' => "required|max:255|unique:Categorys,title, $Category->id",
            'icon_image' => 'sometimes|nullable|icon_image|max:2048',
            'description' => 'required'
        ]);

        $Category->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->icon_image) {
            $icon_imageName = time() . '_' . uniqid() . '.' . $request->icon_image->getClientOriginalExtension();
            $request->icon_image->move(public_path('storage/Category'), $icon_imageName);
            $Category->icon_image = '/storage/Category/' . $icon_imageName;
            $Category->save();
        } else {
            $icon_imageName = $Category->icon_image;
        }
        return response()->json($Category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Working  code to delete Category with icon_image
        if ($category) {
            $icon_image = $category->icon_image;
            $imagePath = public_path($icon_image);
            if ($icon_image && file_exists($imagePath)) {
                unlink($imagePath);
            }
            $category->delete();
        } else {
            return response()->json('Category not found.', 404);
        }

    }
}
