<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'client_phone',
        'city',
        'street',
        'building',
        'totalSum',
        'car',
        'status',
    ];

    public function services() {
        return $this->belongsToMany(Service::class, 'order_service');
    }
}
