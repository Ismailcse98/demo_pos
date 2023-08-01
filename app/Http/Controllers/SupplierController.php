<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::get();
        return view('supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'company_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
        ],[
            'name.required' =>'Name field is required',
            'company_name.required' =>'Company name field is required',
            'phone.required' =>'Phone field is required',
            'address.required' =>'Address field is required',
            'status.required' =>'Status field is required',
        ]);

        try{
            $suppliers = new Supplier();
            $suppliers->name = $request->name;
            $suppliers->company_name = $request->company_name;
            $suppliers->phone = $request->phone;
            $suppliers->address = $request->address;
            $suppliers->status = $request->status;
            $suppliers->save();
            return redirect()->route('suppliers.index');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name'=>'required',
            'company_name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
        ],[
            'name.required' =>'Name field is required',
            'company_name.required' =>'Company name field is required',
            'phone.required' =>'Phone field is required',
            'address.required' =>'Address field is required',
            'status.required' =>'Status field is required',
        ]);

        try{
            $supplier->name = $request->name;
            $supplier->company_name = $request->company_name;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->opening_due = $request->opening_due;
            $supplier->status = $request->status;
            $supplier->update();
            return redirect()->route('suppliers.index');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier deleted successfully');
    }
}
