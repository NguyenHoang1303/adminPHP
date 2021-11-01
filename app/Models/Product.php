<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static count()
 * @method static paginate(int $paginate)
 * @method static where(string $string, $id)
 * @method static find($id)
 * @method static findByName()
 * @method static findAll()
 * @method static findByStatusNotDelete()
 * @method static deleteAll()
 * @method static findMany(mixed $get)
 * @property mixed $price
 * @property mixed $status
 * @property mixed $thumbnail
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id', 'thumbnail', 'price', 'detail', 'description', 'status'
    ];


    public function scopeFindByStatusNotDelete($query)
    {
        return $query->where('status', '!=', -1);
    }

    public function scopeFindByName($query)
    {
        if (request()->has('name')) {
            $query->where('name', 'LIKE', '%' . request()->get('name') . '%');
        }

        return $query;
    }

    public function scopeSortByName($query)
    {
        if (request()->has('sortName')) {
            $sort = request()->get('sortName');
            if ($sort == 'nameAsc') {
                $query->orderBy('name', 'asc');
            }
            if ($sort == 'nameDesc') {
                $query->orderBy('name', 'desc');
            }
        }
        return $query;
    }

    public function scopeSortByPrice($query)
    {
        if (request()->has('sortPrice')) {
            $sort = request()->get('sortPrice');
            if ($sort == 'priceAsc') {
                $query->orderBy('price', 'asc');
            }
            if ($sort == 'priceDesc') {
                $query->orderBy('price', 'desc');
            }
        }
        return $query;
    }

    public function scopeFindByCategory($query)
    {
        if (request()->has('category')) {
            $categoryId = request()->get('category');
            if ($categoryId != 0) {
                $query->where('category_id', $categoryId);
            }
        }
        return $query;
    }

    public function scopeFilterPrice($query)
    {
        $minPrice = (double)request()->get('minPrice');
        $maxPrice = (double)request()->get('maxPrice');
        if ($minPrice > 0 && $maxPrice > 0) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }else if ($minPrice > 0 && $maxPrice == 0){
            $query->where('price','>=',$minPrice);
        }else if ($maxPrice > 0 && $minPrice == 0){
            $query->where('price','<=',$maxPrice);
        }
        return $query;
    }

    public function scopeDeleteAll($query)
    {
        if (request()->has('arrId')) {
            $query->whereIn('id', explode(',', request()->get('arrId')))
                ->update([
                    'status' => -1,
                    'deleted_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                ]);
        }
        return $query;
    }


    public function getHandlerStatusAttribute(): string
    {
        if ($this->status == 1) {
            return "còn hàng";
        }
        if ($this->status == 0) {
            return "hết hàng";
        }
        return "deleted";

    }

    public function getFirstImageAttribute()
    {
        $imageString = $this->thumbnail;
        if (isset($imageString)) {
            return explode(',', $imageString)[0];
        }
        return "";
    }

    function getListImageAttribute()
    {
        $imageString = $this->thumbnail;
        if (isset($imageString)) {
            $images = explode(',', $imageString);
            array_pop($images);
            return $images;
        }
        return "";
    }

    function getFormatPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', ' ');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
