<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\Payment;
use App\Enums\Sort;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $paginate)
 * @method static find($id)
 * @method static searchByInformation()
 */
class Order extends Model
{
    use HasFactory;

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function scopeFindByName($query)
    {
        if (request()->filled('name')) {
            $query->where('ship_name', 'LIKE', '%' . request()->get('name') . '%');
        }

        return $query;
    }

    public function scopeFindById($query)
    {
        if (request()->filled('id')) {
            $query->where('id', request()->get('id'));
        }

        return $query;
    }

    public function scopeFindByPhone($query)
    {
        if (request()->filled('phone')) {
            $query->where('ship_phone', 'LIKE', '%' . request()->get('phone') . '%');
        }

        return $query;
    }
    public function scopeFindByEmail($query)
    {
        if (request()->filled('email')) {
            $query->where('ship_email', 'LIKE', '%' . request()->get('email') . '%');
        }

        return $query;
    }
    public function scopeFindByStatus($query)
    {
        if (request()->filled('status')) {
            $status = request()->get('status');
            if ($status != OrderStatus::None){
                $query->where('status', $status);
            }
        }
        return $query;
    }
    public function scopeFindByPayment($query)
    {
        if (request()->filled('payment')) {
            $payment = request()->get('payment');
            if ($payment == Payment::Complete){
                $query->where('check_out', true);
            }else if($payment == Payment::Unpaid){
                $query->where('check_out', false);
            }
        }
        return $query;
    }

    public function scopeSearchByInformation($query){
        return $query->findByName()
            ->findById()
            ->findByPhone()
            ->findByEmail()
            ->findByStatus()
            ->findByPayment();
    }

    public function scopeSortByName($query)
    {
        if (request()->filled('sortName')) {
            $sort = request()->get('sortName');
            if ($sort == SORT_ASC) {
                $query->orderBy('ship_name', 'asc');
            }
            if ($sort == SORT_DESC) {
                $query->orderBy('ship_name', 'desc');
            }
        }
        return $query;
    }
    public function scopeSortByCreatedAt($query)
    {
        if (request()->filled('created_at')) {
            $sort = request()->get('created_at');
            if ($sort == SORT_ASC) {
                $query->orderBy('created_at', 'asc');
            }
            if ($sort == SORT_DESC) {
                $query->orderBy('created_at', 'desc');
            }
        }
        return $query;
    }

    public function scopeFilterPrice($query)
    {
        $minPrice = (double)request()->get('minPrice');
        $maxPrice = (double)request()->get('maxPrice');
        if (request()->filled('minPrice')  && request()->filled('maxPrice')) {
            $query->whereBetween('total_price', [$minPrice, $maxPrice]);
        }else if (request()->filled('minPrice') && $maxPrice == 0){
            $query->where('total_price','>=',$minPrice);
        }else if (request()->filled('maxPrice') && $minPrice == 0){
            $query->where('total_price','<=',$maxPrice);
        }
        return $query;
    }

    public function scopeFilterDateCreated($query)
    {
        $start = Carbon::parse(request()->get('startDate'));
        $end = Carbon::parse(request()->get('endDate'));
        if (filled($start) && filled($end)){
            if (strtotime($start) == strtotime($end)){
                $query->whereDate('created_at',"=",$start);
            }else{
                $query->whereBetween('created_at',[$start->format('Y-m-d')." 00:00:00",$end->format('Y-m-d')." 23:59:59"]);
            }

        }
        return $query;
    }


    public function scopeSortByPrice($query)
    {
        if (request()->filled('sortPrice')) {
            $sort = request()->get('sortPrice');
            if ($sort == SORT_ASC) {
                $query->orderBy('total_price', 'asc');
            }
            if ($sort == SORT_DESC) {
                $query->orderBy('total_price', 'desc');
            }
        }
        return $query;
    }

    public function scopeSortByInformation($query){
        return $query->sortByPrice()->sortByName()->sortByCreatedAt();
    }

    public function getHandlerStatusAttribute(){
        $status = '';
        switch ($this->status){
            case OrderStatus::Cancel:
                $status = "Cancel";
                break;
            case OrderStatus::Done:
                $status = "Done";
                break;
            case OrderStatus::Waiting:
                $status = "Waiting";
                break;
            case OrderStatus::Deleted:
                $status = "Deleted";
                break;
            case OrderStatus::Processing:
                $status = "Processing";
                break;
        }
        return $status;
    }

    public function getHandlerCheckOutAttribute(): string
    {
        if ($this->check_out){
            return "Complete";
        }
        return "Unpaid";
    }


}
