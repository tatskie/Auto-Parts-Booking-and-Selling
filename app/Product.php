<?php

namespace App;

use App\Reservation;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','description','size','category_id','image','price', 'stocks'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function reservations()
    {
    	return $this->hasMany(Reservation::class);
    }

}
