<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ShopgridController extends Controller
{
    public function index()
    {
        return view('website.home.index',[
            'products'      =>Product::orderBy('id' ,'desc')->take(8)->get(),
            'categories'    =>Category::orderBy('id' ,'asc')->take(6)->get(),

        ]);
    }

    public function category($id)
    {
        return view('website.category.index',[
            'products'      =>Product::where('category_id',$id)->orderBy('id' ,'desc')->get(),
        ]);
    }

    public function subCategory($id)
    {
        return view('website.category.index',[
            'products' =>Product::where('sub_category_id',$id)->orderBy('id' ,'desc')->get(),
            'categories'    =>Category::orderBy('id' ,'desc')->take(1)->get(),
            'subCategories' =>SubCategory::orderBy('id' ,'desc')->take(2)->get(),


        ]);
    }

    public function product($id)
    {
        return view('website.product.index',['product'=>Product::find($id)]);
    }


}
