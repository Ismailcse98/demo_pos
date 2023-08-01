<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::get();
        return view('purchases-order.index',compact('purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::where('status',1)->get();
        $products = Purchase::where('status',1)->get();
        return view('purchases-order.create',compact('suppliers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id'=>'required',
            'order_no'=>'required',
            'order_date'=>'required',
            'product_id.*'=>'required',
            'qty.*'=>'required',
            'unit_price.*'=>'required',
        ],[
            'supplier_id.required' =>'Supplier field is required',
            'order_no.required' =>'Order field is required',
            'order_date.required' =>'Order Date field is required',
            'product_id.*.required' =>'Product field is required',
            'qty.*.required' =>'Qty field is required',
            'unit_price.*.required' =>'Price field is required',
            
        ]);

        try{
            $purchaseOrder = new PurchaseOrder();
            $purchaseOrder->supplier_id = $request->supplier_id;
            $purchaseOrder->order_no = $request->order_no;
            $purchaseOrder->order_date = $request->order_date;
            $purchaseOrder->save();
            $order_id = $purchaseOrder->id;

            for ($i=0; $i < count($request->product_id); $i++) { 
                $orderItem = new PurchaseOrderItem();
                $orderItem->purchase_order_id = $order_id;
                $orderItem->purchases_id = $request->product_id[$i];
                $orderItem->qty = $request->qty[$i];
                $orderItem->unit_price = $request->unit_price[$i];
                $orderItem->save();
            }

            return redirect()->route('purchases-order.index');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetail = PurchaseOrder::with(['supplier','orderItems'])->find($id);
        return view('purchases-order.details',compact('orderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::where('status',1)->get();
        $products = Purchase::where('status',1)->get();
        $orderDetail = PurchaseOrder::with(['supplier','orderItems'])->find($id);
        return view('purchases-order.edit',compact('orderDetail','suppliers','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id'=>'required',
            'order_no'=>'required',
            'order_date'=>'required',
            'product_id.*'=>'required',
            'qty.*'=>'required',
            'unit_price.*'=>'required',
        ],[
            'supplier_id.required' =>'Supplier field is required',
            'order_no.required' =>'Order field is required',
            'order_date.required' =>'Order Date field is required',
            'product_id.*.required' =>'Product field is required',
            'qty.*.required' =>'Qty field is required',
            'unit_price.*.required' =>'Price field is required',
            
        ]);

        try{
            $purchaseOrder = PurchaseOrder::find($id);
            $purchaseOrder->supplier_id = $request->supplier_id;
            $purchaseOrder->order_no = $request->order_no;
            $purchaseOrder->order_date = $request->order_date;
            $purchaseOrder->update();
            $order_id = $purchaseOrder->id;

            for ($i=0; $i < count($request->product_id); $i++) { 
                
                $orderItem = PurchaseOrderItem::where('purchase_order_id',$order_id)->get();
                $orderItem[$i]->purchase_order_id = $order_id;
                $orderItem[$i]->purchases_id = $request->product_id[$i];
                $orderItem[$i]->qty = $request->qty[$i];
                $orderItem[$i]->unit_price = $request->unit_price[$i];
                $orderItem[$i]->update();
            }

            return redirect()->route('purchases-order.index');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function print($id)
    {
        $orderDetail = PurchaseOrder::with(['supplier','orderItems'])->find($id);
        return view('purchases-order.printview',compact('orderDetail'));
    }
}
