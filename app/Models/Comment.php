<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $primaryKey = "id";
    protected $fillable = [
        "description",
        "user_id",
        "commentable_id",
        "commentable_type"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commentable(){
        return $this->morphTo();
    }


}

