<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventories extends Model
{
    protected $table = 'inventories';

    public $timestamps = false;

    protected $primaryKey = 'variant_id';

    public $incrementing = false;

    protected $fillable = [
        'variant_id',
        'stock_on_hand',
        'stock_reserved',
        'low_stock_threshold',
    ];

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }
}
