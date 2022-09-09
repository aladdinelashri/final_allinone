<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'Title','Description','Color','Size','Weight','note','logo','coloroption_id','weightoption_id','sizeoption_id','Brand_id','categoryitem_id','in_stock',
    ];
    protected $dates = ['deleted_at'];

    
    public function categoryitem()
    {
        return $this->hasOne(Categoryitem::class);
    }


    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    
    public function coloroption()
    {
        return $this->hasOne(Coloroption::class);
    }


    public function weightoption()
    {
        return $this->hasOne(Weightoption::class);
    }


    public function sizeoption()
    {
        return $this->hasOne(Sizeoption::class);
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