<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    protected $table = "enrolls";
    protected $primaryKey = "id";
    protected $fillable = [
        'image',
        'post_id',
        'user_id',
        'stage_id',
        'remark'
    ];

    public function customer(){

        // Method 1
        // $customers = Customer::where('user_id',$userid)->get();

        // foreach($customers as $customer){
        //     // dd($customer);
        //     // dd($customer['accountid']);
        //     return $customer['accountid'];
        // }

        // Method 2
        // $customers = Customer::where('user_id',$userid)->get()->pluck('accountid');

        // foreach($customers as $customer){
        //     // dd($customer);
        //     return $customer;
        // }

        // Method 3
        // $customers = Customer::where('user_id',$this->user_id)->get()->pluck('accountid');

        // foreach($customers as $customer){
        //     // dd($customer);
        //     return $customer;
        // }

        // Method 4
        // $customers = Customer::where('user_id',$this->user_id)->get();

        // foreach($customers as $customer){
        //     // dd($customer);
        //     // dd($customer['accountid']);
        //     return $customer['accountid'];
        // }

        // Method 5
        // $customers = Customer::join('users','users.id','=','customers.user_id')->where('user_id',$this->user_id)->get();
        // // dd($customers);
        // foreach($customers as $customer){
        //     // dd($customer);
        //     // dd($customer['accountid']);
        //     return $customer['accountid'];
        // }

        // Method 6   join(sec table,sec table primary, compare,pri table fk key)
        // $customers = Customer::join('users','users.id','=','customers.user_id')->where('user_id',$this->user_id)->get()->pluck('accountid');
        // // dd($customers);
        // foreach($customers as $customer){
        //     // dd($customer);

        //     return $customer;
        // }

        // Method 6   join(sec table,sec table primary, compare,pri table fk key)
        // $customers = Customer::join('users','users.id','=','customers.user_id')->where('user_id',$this->user_id)->get(['users.*','customers.*']);
        // dd($customers);
        // foreach($customers as $customer){
        //     // dd($customer);
        //     return $customer;
        // }

        // Method 7
        // $customers = Customer::join('users','users.id','=','customers.user_id')->where('user_id',$this->user_id)->get(['users.name','customers.accountid'])->first();
        // return $customers["accountid"];

        // Method 8
        $customers = Customer::join('users','users.id','=','customers.user_id')->where('user_id',$this->user_id)->get(['users.name','customers.accountid'])->pluck('accountid')->first();
        return $customers;



    }

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customerurl(){
        return Customer::where('user_id',$this->user_id)->get(['customers.id'])->first();
    }

}
