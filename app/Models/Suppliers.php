<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suppliers extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'CompanyName', 'ContactName', 'ContactTitle', 'Address', 'City', 'Phone', 'mobile', 'Email', 'WebSite', 'DiscountType', 'Logo', 'Note', 'CurrentOrder',

    ];
    protected $guarded = array('CompanyName', 'ContactName', 'ContactTitle', 'Address', 'City', 'Phone', 'mobile', 'Email', 'WebSite', 'DiscountType', 'Logo', 'Note', 'CurrentOrder');

    public function item()
    {
        return $this->belongsToMany(Item::class);
    }
}
