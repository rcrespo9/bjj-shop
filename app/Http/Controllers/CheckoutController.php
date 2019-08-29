<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        return view('checkout');
    }

    public function store(Request $request) {
        $customer = Customer::firstOrCreate(request(['contact_name', 'company_name', 'address', 'city', 'state', 'zip_code', 'country', 'phone']));
        $order = Order::create(['order_date' => date("Y-m-d H:i:s")]);
        $order_details_arr = array();
        
        foreach ($request->product as $product) {
            $product_item = Product::find($product);
            $order_detail = OrderDetail::create([
                'quantity_ordered' => $request->input('product_' . $product . '.quantity'),
                'price_each' => $product_item->price
            ]);
            $product_item->update(['quantity_in_stock' => $product_item->quantity_in_stock - $request->input('product_' . $product . '.quantity')]);
            $product_item->order_details()->save($order_detail);
            array_push($order_details_arr, $order_detail);
        }

        $order->order_details()->saveMany($order_details_arr);
        $customer->order_details()->saveMany($order_details_arr);
        $customer->orders()->save($order);

        return redirect('/thanks');
    }
}
