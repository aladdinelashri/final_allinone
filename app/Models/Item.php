<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'Name','Size','Weight','Color','Note','coloroption_id','weightoption_id','sizeoption_id','brand_id','categoryitem_id','in_stock',
    ];


    public function categoryitem()
    {
        return $this->belongsTo(Categoryitem::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function coloroption()
    {
        return $this->belongsTo(Coloroption::class);
    }


    public function weightoption()
    {
        return $this->belongsTo(Weightoption::class);
    }


    public function sizeoption()
    {
        return $this->belongsTo(Sizeoption::class);
    }


     public function supplier()
    {
        return $this->belongsToMany(Supplier::class);
    }


 public function product()
    {
        return $this->belongsToMany(Product::class);
    }



public function tagitem()
    {
        return $this->belongsToMany(Tagitem::class);
    }



}
