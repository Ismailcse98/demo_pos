<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::with('unit')->get();
        return view('purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::where('status',1)->get();
        return view('purchase.create',compact('units'));
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
            'name'=>'required',
            'unit_id'=>'required',
            'status'=>'required',
        ],[
            'name.required' =>'Name field is required',
            'unit_id.required' =>'Unit field is required',
            'status.required' =>'Status field is required',
        ]);

        try{
            $purchase = new Purchase();
            $purchase->name = $request->name;
            $purchase->unit_id = $request->unit_id;
            $purchase->code = $request->code;
            $purchase->description = $request->description;
            $purchase->status = $request->status;
            $purchase->save();
            return redirect()->route('purchases.index');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $units = Unit::where('status',1)->get();
        return view('purchase.edit',compact('purchase','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'name'=>'required',
            'unit_id'=>'required',
            'status'=>'required',
        ],[
            'name.required' =>'Name field is required',
            'unit_id.required' =>'Unit field is required',
            'status.required' =>'Status field is required',
        ]);

        try{
            $purchase->name = $request->name;
            $purchase->unit_id = $request->unit_id;
            $purchase->code = $request->code;
            $purchase->description = $request->description;
            $purchase->status = $request->status;
            $purchase->update();
            return redirect()->route('purchases.index');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier deleted successfully');
    }
}
