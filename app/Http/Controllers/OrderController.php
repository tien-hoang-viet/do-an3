<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentProduct;
use App\Models\Product;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('customer', 'order')->get();
        return view('admin.pages.order.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $request->customer;
        $products = $request->product;
        $paymentData = $request->payment;
        $productData = [];
        for ($i = 0; $i < count($products['quantity']); $i++) {
            $productData[$i] = [];
        }
        for ($i = 0; $i < count($products['quantity']); $i++) {
            foreach ($products as $key => $value) {
                $productData[$i][$key] = $value[$i];
            }
        }
        DB::beginTransaction();
        $now = Carbon::now()->toDateTimeString();
        try {
            $customer = Customer::create($customer);
            $paymentData['customer_id'] = $customer->id;
            $paymentData['date'] = $now;
            $payment = Payment::create($paymentData);
            $order = Order::create([
                'date' => $now,
                'status' => 'pending',
                'payment_id' => $payment->id,
            ]);
            foreach ($productData as $value) {
                $paymentProduct = PaymentProduct::create([
                    'quantity' => $value['quantity'],
                    'payment_id' => $payment->id,
                    'product_id' => $value['id'],
                ]);
                $product = Product::where('id', $paymentProduct->product_id)->first();
                $productQuantity = $product->quantity - $paymentProduct->quantity;
                $product->update([
                    'quantity' => $productQuantity,
                ]);
                $product->save();
            }
            DB::commit();
            return response()->json(['msg' => "Create order success", 'href' => route('homepage')], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
