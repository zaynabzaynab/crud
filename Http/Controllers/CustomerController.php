<?php

namespace Za\Crud\Http\Controllers;

use Za\Crud\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $customers = Customer::latest()->paginate(5);
      
            return view('customers.index',compact('customers'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name' => 'required',
            'social' => 'required',
            'tel' => 'required',
            'email' => 'required',
        ]);
  
        Customer::create($request->all());
   
        return redirect()->route('customers.index')
                        ->with('success','Info of the customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Za\Crud\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Za\Crud\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Za\Crud\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'social' => 'required',
            'tel' => 'required',
            'email' => 'required',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('customers.index')
                        ->with('success','Info of the customer are updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Za\Crud\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $product->delete();
  
        return redirect()->route('customers.index')
                        ->with('success','Info of customer are deleted successfully');
    }
}
