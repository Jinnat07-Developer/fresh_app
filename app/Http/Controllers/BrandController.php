<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function manage()
    {
        return view('admin.brand.manage',['brands'=>Brand::all()]);
    }

    public function store(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message','Brand info save successfully..');
    }


    public function edit($id)
    {
        return view('admin.brand.edit',['brand'=>Brand::find($id)]);
    }

    public function update(Request $request, $id)
    {
       Brand::updateBrand($request, $id);
       return back()->with('message','Brand info update successfully...');
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return back()->with('message',' deleted successfully..');
    }


}
