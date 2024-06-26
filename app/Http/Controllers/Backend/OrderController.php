<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use App\Models\OrderDetails;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function PendingOrder()
    {
        $orders = Order::where('status', 'pending')->where('cancel_order_status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    } // End Method

    public function AdminOrderDetails($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.admin_order_details', compact('order', 'orderItem'));
    } // End Method

    public function AdminConfirmedOrder()
    {
        $orders = Order::where('status', 'confirmed')->where('cancel_order_status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    } // End Method

    public function AdminProcessingOrder()
    {
        $orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    } // End Method

    public function AdminDeliveredOrder()
    {
        $orders = Order::where('status', 'delivered')->where('return_order_status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    } // End Method

    public function PendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'confirmed',
            'confirmed_date' => Carbon::now()->format('d-m-Y H:i:s'),
        ]);
        $notification = array(
            'message' => 'Order Confirmed Successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.confirmed.order')->with($notification);
    } // End Method

    public function ConfirmToProcessing($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'processing',
            'processing_date' => Carbon::now()->format('d-m-Y H:i:s'),
        ]);
        $notification = array(
            'message' => 'Order Processing Successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.processing.order')->with($notification);
    } // End Method

    public function ProcessingToDelivered($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'delivered',
            'delivered_date' => Carbon::now()->format('d-m-Y H:i:s'),
            'delivered_day' => Carbon::now()->format('d'),
            'delivered_month' => Carbon::now()->format('m'),
            'delivered_year' => Carbon::now()->format('Y'),
        ]);
        $notification = array(
            'message' => 'Order Delivered Successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.delivered.order')->with($notification);
    } // End Method

    public function AdminInvoiceDownload($order_id)
    {
        $order = Order::with('user')->where('id', $order_id)->first();
        $orderItem = OrderDetails::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption(['tempDir' => public_path(), 'chroot' => public_path()]);
        return $pdf->download('invoice.pdf');
    } // End Method

    public function UpdateStatusNewOrder($id)
    {
        DB::table('notifications')->where('id', $id)->update(['status' => 1]);
        return response()->json([
            'success' => 'OK!'
        ]);
    } // End Method
}
