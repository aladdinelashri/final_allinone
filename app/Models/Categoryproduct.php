<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoryproduct extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'note',
    ];

    protected $dates = ['deleted_at'];

       protected $guarded = array(
        'name','note',  );

        public function products()
        {
            return $this->hasMany(Product::class);
        }


}

