<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetail extends Model
{
    use HasFactory;

    private static $orderDetails,$orderDetail;

    public static function newOrderDetail( $id)
    {
        foreach (Cart::content() as $item)
        {
            self::$orderDetails                 = new OrderDetail();
            self::$orderDetails->order_id         =$id;
            self::$orderDetails->product_id       =$item->id;
            self::$orderDetails->product_name     =$item->name;
            self::$orderDetails->product_price    =$item->price;
            self::$orderDetails->product_quantity =$item->qty;
            self::$orderDetails->save();
            return self::$orderDetails;

            Cart::remove($item->rowId);
        }
    }

    public static function deleteOrderDetails($id)
    {
        self::$orderDetails = Order::where('order_id',$id)->get();
        foreach( self::$orderDetails as $orderDetail)
        {
            self::$orderDetail->delete();
        }

    }

}
