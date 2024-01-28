<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
   {
       return view('admin.product.index',[
           'categories'     =>Category::all(),
           'sub_categories' =>SubCategory::all(),
           'brands'         =>Brand::all(),
           'units'          =>Unit::all(),
       ]);
   }

     private $categoryId,$subCategory;

   public function getSubCategoryByCategory()
   {
       $this->categoryId           =$_GET['id'];
       $this->subCategory          =SubCategory::where('category_id',$this->categoryId)->get();
       return response()->json( $this->subCategory);
   }

   public function manage()
   {
       return view('admin.product.manage',['products'=>Product::all()]);
   }

   public function store(Request $request)
   {
      $this->product   = Product::newProduct($request);
      ProductImage::newProductImage($request->other_image,$this->product->id);
      return back()->with('message','Product info save done..');
   }

   public function edit($id)
   {
       return view('admin.product.edit',[
           'product'=>Product::find($id),
           'categories'     =>Category::all(),
           'sub_categories' =>SubCategory::all(),
           'brands'         =>Brand::all(),
           'units'          =>Unit::all(),
           'otherImages'    =>ProductImage::all(),
       ]);
   }

    public function detail($id)
    {
        return view('admin.product.detail',['product'=>Product::find($id)]);
    }

   public function update(Request $request, $id)
   {
       Product::updateProduct($request, $id);

       if($request->file('other_image'))
       {
           ProductImage::updateProductImage($request->file('other_image'),$id);
       }

       return redirect('product/manage')->with('message','product update successful');

   }

   public function delete($id)
   {

       Product::deleteProduct($id);
       ProductImage::deleteProductOtherImage($id);
       return back()->with('message','product deleted.....');
   }

}
