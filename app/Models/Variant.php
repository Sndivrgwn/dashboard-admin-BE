<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variant extends Model
{
    use HasFactory;

    protected $table = 'variants';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'sku',
        'option1_name',
        'option1_value',
        'option2_name',
        'option2_value',
        'price',
        'compare_at_price',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function cart_items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
