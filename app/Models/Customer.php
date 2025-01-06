<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    protected $primaryKey = "id";
    protected $fillable = [
        'accountid',
        'firstname',
        'lastname',
        'slug',
        'email',
        'remark',
        'address',
        'status_id',
        'user_id'
    ];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
