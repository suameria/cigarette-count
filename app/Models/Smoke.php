<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Smoke extends Model
{
    use HasFactory;

    protected $table = 'smokes';

    protected $fillable = [
        'brand_id',
        'user_id',
        'brand_name',
        'count',
        'per_price',
        'amount',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
