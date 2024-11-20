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
        // $this->validate($request,[
        //     'accountid'=>'required|unique:customers,accountid',
        //     'firstname'=>'required',
        //     'lastname'=>'required',
        //     'remark'=>'max:500'
        // ]);

        // dd("hee hee");

        $user = Auth::user();
        $customer = new Customer();
        $customer->accountid = $request['accountid'];
        $customer->firstname = $request['firstname'];
        $customer->lastname = $request['lastname'];
        $customer->slug = Str::slug($request['firstname']);
        $customer->email = $request['email'];
        $customer->remark = $request['remark'];
        $customer->address = $request['address'];
        $customer->user_id = $user->id;

        $customer->save();

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        // dd($customer);
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user_id = $user['id'];
        $customer = Customer::findOrFail($id);
        $customer->accountid = $request['accountid'];
        $customer->firstname = $request['firstname'];
        $customer->lastname = $request['lastname'];
        $customer->slug = Str::slug($request['firstname']);
        $customer->email = $request['email'];
        $customer->remark = $request['remark'];
        $customer->address = $request['address'];
        $customer->user_id = $user_id;

        $customer->save();

        return redirect(route('customers.index'));
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
