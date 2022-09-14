<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Brand extends Model
{
    use HasFactory;
    use Softdeletes;
    use HasTags;


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
