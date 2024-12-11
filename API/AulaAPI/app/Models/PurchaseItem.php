<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use SoftDeletes; 

    protected $table='purchase_items';
    protected $fillable = [
        'purchase_id',
        'item_id',
        'item_quantity',
        'item_price',
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
