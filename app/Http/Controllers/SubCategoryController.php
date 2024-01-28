<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
   public function index()
   {
       return view('admin.subCategory.index',['categories'=>Category::all()]);
   }

    public function manage()
    {
        return view('admin.subCategory.manage',['sub_categories'=>SubCategory::all()]);
    }

    public function store(Request $request)
    {
      SubCategory::newSubCategory($request);
      return back()->with('message','Subcategory info save sucessful.');
    }

   public function edit($id)
   {
       return view('admin.subCategory.edit',[
           'sub_category'=>SubCategory::find($id),
           'categories' =>Category::all(),
       ]);
   }

    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request,$id);
        return back()->with('message','Subcategory info update successful.');
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return back()->with('message','Subcategory info delete successful.');
    }

}
