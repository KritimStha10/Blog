<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    protected $view = 'admin.news.';
    protected $redirect = 'super-admin/news';

    public function index()
    {
        $news = News::orderBy('created_at','desc')->get();

        return view($this->view .'index',compact('news'));
    }

    public function create()
    {
        $authors = User::orderBy('created_at','desc')->get();
        $categories = Category::orderBy('created_at','desc')->get();
        return view($this->view . 'create',compact('authors','categories'));
    }

    public function store(StoreNewsRequest $request)
    {
        $validatedData = $request->validated();

        $new = new News();
        $new->title = $validatedData['title'];
        $new->content = $validatedData['content'];
        $new->author_id = $validatedData['author_id'];
        $new->category_id = $validatedData['category_id'];
        $new->published_at = $validatedData['published_at'];

        $new->save();
        Session::flash('success', 'News have been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        // dd($service);
        $new = News::findOrFail($id);
        $authors = User::orderBy('created_at','desc')->get();
        $categories = Category::orderBy('created_at','desc')->get();
        return view($this->view .'edit', compact('new','authors','categories'));
    }

    public function update(StoreNewsRequest $request, $id)
    {
        $validatedData = $request->validated();

        $new = News::findOrFail($id);
        $new->title = $validatedData['title'];
        $new->content = $validatedData['content'];
        $new->author_id = $validatedData['author_id'];
        $new->category_id = $validatedData['category_id'];
        $new->published_at = $validatedData['published_at'];
        $new->save();


        Session::flash('success', 'News has been updated!');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $new = News::findOrFail($id);
        return view($this->view . 'show', compact('new'));
    }


    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->delete();


        Session::flash('success', 'News has been deleted!');
        return redirect($this->redirect);
    }
}
