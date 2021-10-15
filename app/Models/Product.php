<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static count()
 * @method static paginate(int $paginate)
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'categoryId', 'thumbnail', 'price', 'detail', 'description', 'status'
    ];
}
