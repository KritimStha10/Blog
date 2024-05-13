<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    protected $view = 'admin.post.';
    protected $redirect = 'super-admin/posts';

    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();

        return view($this->view .'index',compact('posts'));
    }

    public function create()
    {
        $authors = User::orderBy('created_at','desc')->get();
        $categories = Category::orderBy('created_at','desc')->get();
        return view($this->view . 'create',compact('authors','categories'));
    }

    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->author_id = $validatedData['author_id'];
        $post->category_id = $validatedData['category_id'];
        $post->published_at = $validatedData['published_at'];

        $post->save();
        Session::flash('success', 'Post have been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        // dd($service);
        $post = Post::findOrFail($id);
        $authors = User::orderBy('created_at','desc')->get();
        $categories = Category::orderBy('created_at','desc')->get();
        return view($this->view .'edit', compact('post','authors','categories'));
    }

    public function update(StorePostRequest $request, $id)
    {
        $validatedData = $request->validated();

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->author_id = $validatedData['author_id'];
        $post->category_id = $validatedData['category_id'];
        $post->published_at = $validatedData['published_at'];
        $post->save();


        Session::flash('success', 'Post has been updated!');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view($this->view . 'show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();


        Session::flash('success', 'Post has been deleted!');
        return redirect($this->redirect);
    }
}
