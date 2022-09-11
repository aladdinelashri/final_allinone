<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fifthoption extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'note',
    ];

    protected $dates = ['deleted_at'];

       protected $guarded = array(
        'name','note',  );

        public function items()
        {
            return $this->hasMany(Item::class);
        }

}

