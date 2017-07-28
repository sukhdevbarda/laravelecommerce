<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';
    protected $fillable=['name','cat_id','sub_cat_id'];

    public function productsImages(){

    	return $this->hasMany('App\Models\ProductImages','product_id');		

    }

}
