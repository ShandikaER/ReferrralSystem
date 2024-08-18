<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Point extends Model
{
    protected $fillable = [
        'user_id',
        'points',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}