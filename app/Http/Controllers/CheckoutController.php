<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;
use App\Http\Controllers\SslCommerzPaymentController;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;

    public function index()
    {
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = '';
        }
        return view('website.checkout.index',['customer'=>$this->customer]);
    }

    private $SslCommerzPaymentController;

    public function newOrder(Request $request)
    {
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = Customer::where('email',$request->email)->orWhere('mobile',$request->mobile)->first();
            if(!$this->customer)
            {
                $this->customer = Customer::newCustomer($request);

            }

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }

        if($request->payment_method == 'online')
        {
            $this->SslCommerzPaymentController =new SslCommerzPaymentController();
            $this->SslCommerzPaymentController->index($request, $this->customer);

        }

        $this->order = Order::customerNewOrder($request, $this->customer->id);
        OrderDetail::newOrderDetail( $this->order->id);
        return redirect('/complete-order')->with('message','Congratulations your order info post successfully.Please wait ,we will contact with you soon');

    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }

}
