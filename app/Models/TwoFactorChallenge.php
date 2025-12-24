<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TwoFactorChallenge extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id', 'code_hash', 'expires_at', 'consumed_at', 'attempts', 'last_sent_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'consumed_at' => 'datetime',
        'last_sent_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
