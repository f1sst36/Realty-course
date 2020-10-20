<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderType;
use App\Models\OrderStructure;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'type',
        'structure',
        'area',
        'price',
        'description',
        'status',
    ];

    public function orderType(){
        return $this->belongsTo(OrderType::class, 'type');
    }

    public function orderStructure(){
        return $this->belongsTo(OrderStructure::class, 'structure');
    }
}
