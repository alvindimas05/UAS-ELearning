<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',
        'amount',
        'status',
        'midtrans_transaction_id',
        'midtrans_order_id',
        'midtrans_gross_amount',
        'midtrans_payment_type',
        'snap_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
