<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function newOrders()
    {
        $orders = Order::with('user')->get(); // نمایش تمام سفارشات
        return view('orders.index', compact('orders'));
    }

    // ثبت سفارش جدید
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = $request->total_price;
        $order->status = 'pending';
        $order->save();

        // ذخیره جزئیات سفارش
        foreach ($request->products as $film_id) {
            $order->orderItems()->create([
                'product_id' => $film_id,
                'quantity' => 1, // می‌تونی این مقدار رو از فرم بگیری
                'price' => Product::find($film_id)->price,
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'سفارش با موفقیت ثبت شد!');
    }

    // تغییر وضعیت سفارش به پرداخت شده
    public function markAsPaid(Order $order)
    {
        $order->status = 'paid';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'وضعیت سفارش به پرداخت شده تغییر یافت!');
    }


    public function sending()
    {
        $orders = Order::where('delivery_status', 1)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function unpaid()
    {
        $orders = Order::where('payment_status', 0)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function canceled()
    {
        $orders = Order::where('order_status', 4)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function returned()
    {
        $orders = Order::where('order_status', 5)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function all()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.market.order.show', compact('order'));
    }

    public function detail(Order $order)
    {
        return view('admin.market.order.detail', compact('order'));
    }

    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default :
                $order->delivery_status = 0;
        }
        $order->save();
        return back();
    }

    public function changeOrderStatus(Order $order)
    {
        switch ($order->order_status) {
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            case 4:
                $order->order_status = 5;
                break;
            case 5:
                $order->order_status = 6;
                break;
            default :
                $order->order_status = 1;
        }
        $order->save();
        return back();
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        return back();
    }
}
