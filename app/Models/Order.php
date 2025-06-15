<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'status',
        'comment',
        'product_id',
        'quantity'
    ];

    protected $attributes = [
        'status' => 'new',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->product->price;
    }

    public function getFormattedTotalPriceAttribute()
    {
        return number_format($this->total_price, 2);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d.m.Y H:i');
    }
}
