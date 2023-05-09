<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smoke extends Model
{
    use HasFactory;

    protected $table = 'smokes';

    protected $fillable = [
        'brand_id',
        'user_id',
        'brand_name',
        'per_price',
        'count',
    ];
}
