<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json($posts, 200);
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
            'title' => 'required|max:255|unique:posts,title',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',

        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image
        ]);

        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/post'), $imageName);
            $post->image = '/storage/post/' . $imageName;
            $post->save();
        }

        return response()->json($post, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|max:255|unique:posts,title, $post->id",
            'image' => 'sometimes|nullable|image|max:2048',
            'description' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/post'), $imageName);
            $post->image = '/storage/post/' . $imageName;
            $post->save();
        } else {
            $imageName = $post->image;
        }
        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Working  code to delete post with image
        if ($post) {
            $postImage = $post->image;
            $imagePath = public_path($postImage);
            if ($postImage && file_exists($imagePath)) {
                unlink($imagePath);
            }
            $post->delete();
        } else {
            return response()->json('Post not found.', 404);
        }
        //Another code to delete post with image
        // if ($post) {
        //     $postImage = $post->image;
        //     $imagePath = public_path($postImage);
        //     if ($post->image && file_exists($imagePath)) {
        //         unlink($post->image);
        //     }
        //     $post->delete();
        // } else {
        //     return response()->json('Post not found.', 404);
        // }
    }
}
