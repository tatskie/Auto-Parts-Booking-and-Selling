<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded=[];
    protected $fillable = [
    		'image_path',
    		'product_id'
     	];
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
