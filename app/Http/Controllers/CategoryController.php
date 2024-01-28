<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function manage()
    {
        return view('admin.category.manage',['categories'=>Category::all()]);
    }

    public function store(Request $request)
    {
        Category::newCategory($request);
        return back()->with('message','category info save successfully');
    }

    public function edit($id)
    {
        return view('admin.category.edit',['category'=>Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return back()->with('message','category info update successfully');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return back()->with('message','category info delete successfully');
    }

}
