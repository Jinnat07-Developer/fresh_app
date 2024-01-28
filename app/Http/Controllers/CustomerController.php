<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function manage()
    {
        return view('admin.customer.manage',['customers'=>Customer::all()]);
    }

    public function edit($id)
    {
        return view('admin.customer.edit',['customer'=>Customer::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Customer::updateCustomer($request, $id);
        return back()->with('message','Customer info updated.....');
    }

    public function delete($id)
    {
        Customer::deleteCustomer($id);
        return back()->with('message','Customer info deleted.....');
    }
}
