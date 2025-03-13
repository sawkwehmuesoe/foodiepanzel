<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = "attendances";
    protected $primaryKey = "id";
    protected $fillable = [
        "classdate",
        "post_id",
        "attcode",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function customer($userid){

        // Method 1
        // $customers = Customer::where('user_id',$userid)->get();

        // foreach($customers as $customer){
        //     // dd($customer);
        //     // dd($customer['accountid']);
        //     return $customer['accountid'];
        // }

        // Method 2
        $customers = Customer::where('user_id',$userid)->get()->pluck('accountid');

        foreach($customers as $customer){
            // dd($customer);
            return $customer;
        }

    }
}
