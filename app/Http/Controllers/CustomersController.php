<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'regnumber'=>'required|unique:customers,regnumber',
            'firstname'=>'required',
            'lastname'=>'required',
            'remark'=>'max:200'
        ]);

        $user = Auth::user();
        $customer = new Customer();
        $customer->regnumber = $request['regnumber'];
        $customer->firstname = $request['firstname'];
        $customer->lastname = $request['lastname'];
        $customer->slug = Str::slug($request['firstname']);
        $customer->remark = $request['remark'];
        $customer->user_id = $user->id;

        $customer->save();
        return redirect(route('customers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->back();
    }
}
