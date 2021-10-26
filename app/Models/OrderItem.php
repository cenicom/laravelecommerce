<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "orderItems";

    public function order()
    {
        # code...
        return $this->belongsTo(Order::class);
    }
}
