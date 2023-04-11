<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PostDataTable $dataTable){
        return $dataTable->render('admin.posts.index');
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request){
        auth()->user()->posts()->create($request->validated());

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post, UpdatePostRequest $request){
        $post->update($request->validated());

        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post){
        $post->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
