<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_order_id','purchases_id','qty','unit_price'];

    public function product()
    {
        return $this->belongsTo(Purchase::class,'purchases_id');
    }
}
