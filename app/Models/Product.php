<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static count()
 * @method static paginate(int $paginate)
 * @method static where(string $string, $id)
 * @method static find($id)
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

    public function getHandlerStatusAttribute(): string
    {
        if ($this->status == 1){
            return "còn hàng";
        }
        if ($this->status == 0){
            return "hết hàng";
        }
        return "deleted";

    }

    public function getFirstImageAttribute(){
        $imageString = $this->thumbnail;
        if (isset($imageString)){

            return explode(',',$imageString)[0];
        }
        return "";
    }

    function getListImageAttribute(){
        $imageString = $this->thumbnail;
        if (isset($imageString)){
            $images = explode(',',$imageString);
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
