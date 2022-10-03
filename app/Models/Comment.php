<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Product()   // post_id
    {
        return $this->belongsTo(Product::class);
    }

    public function author()  // author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
