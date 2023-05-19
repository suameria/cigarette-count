<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
