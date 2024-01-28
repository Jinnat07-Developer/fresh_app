<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    private $pdf;

    public function manage()
    {
        return view('admin.order.manage',['orders'=>Order::latest()->get()]);
    }

    public function edit($id)
    {
        return view('admin.order.edit',['order'=>Order::find($id)]);
    }

    public function detail($id)
    {
        return view('admin.order.detail',['order'=>Order::find($id)]);
    }

    public function showInvoice($id)
    {
        return view('admin.order.show-invoice',['order'=>Order::find($id)]);
    }

    public function downloadInvoice($id)
    {

        $this->pdf = PDF::loadView('admin.order.download-invoice',['order'=>Order::find($id)]);
        return $this->pdf->stream('invoice.pdf');

    }

    public function update(Request $request, $id)
    {
       Order::updateOrder($request, $id);
       return redirect('/order/manage')->with('message','Order info status update successfully');
    }

    public function delete($id)
    {
       Order::deleteOrder($id);
       OrderDetail::deleteOrderDetails($id);
        return redirect('/order/manage')->with('message','Order info status delete successfully');
    }
}
