<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'warehouse',
        'city',
        'card',
        'quantity',
        'date',
        'status',
    ];
    use HasFactory;
}
