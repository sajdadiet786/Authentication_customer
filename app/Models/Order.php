<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $primarykey='id';
    protected $fillable=[
        'order',
        'amount',
        'customer_id'
    ];
    public function customer(){
        return $this->hasOne(Customer::class,'customer_id','id');
    }
    public function items(){
        return $this->hasMany(Item::class);
    }
}
