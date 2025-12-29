<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'brand_id',
        'image',
        'name',
        'color',
        'weight_kg',
        'length_cm',
        'width_cm',
        'description',
        'price',
        'stock_quantity',
        'availability_status',
        'visibility',
        'channel',
        'status',
        'scheduled_at',
        'SKU'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_images(): HasMany
    {
        return $this->HasMany(ProductImages::class);
    }

    public function variants(): HasMany {
        return $this->hasMany(Variant::class);
    }
}
