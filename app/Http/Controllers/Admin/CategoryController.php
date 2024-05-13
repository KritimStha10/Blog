<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $view = 'admin.category.';
    protected $redirect = 'super-admin/categories';

    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->get();

        return view($this->view .'index',compact('categories'));
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category();
        $category->name = $validatedData['name'];


        $category->save();
        Session::flash('success', 'Category have been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view($this->view .'edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($id);
        $category->name = $validatedData['name'];

        $category->save();


        Session::flash('success', 'Category has been updated!');
        return redirect($this->redirect);
    }



    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();


        Session::flash('success', 'Category has been deleted!');
        return redirect($this->redirect);
    }
}
