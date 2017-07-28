<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table='productimages';
    protected $fillable=['image','product_id'];
}
