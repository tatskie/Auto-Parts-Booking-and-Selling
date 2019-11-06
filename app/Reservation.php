<?php

namespace App;

use App\User;
use App\Product;
use App\Receipt;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
    		'time',
    		'date',
    		'plate_no',
            'user_id',
            'product_id',
     	];

    //relatioship to records
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relatioship to records
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }
}
