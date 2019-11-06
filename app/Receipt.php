<?php

namespace App;

use App\User;
use App\Reservation;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
     protected $table = 'receipts';

    protected $fillable = [
    		'receipt_no',
            'user_id',
            'reservation_id',
            'status',
            'cancel',
     	];

    //relatioship to records
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relatioship to records
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
