<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Status extends Model
{
    use HasFactory;

    protected $table = "statuses";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'slug',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
