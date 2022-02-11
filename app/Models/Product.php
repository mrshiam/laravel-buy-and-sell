<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'short_desc',
        'long_desc',
        'price',
        'image_url',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
