<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends \Spatie\Tags\Tag
{


    use HasFactory;

    protected $fillable = [
        'name','tag_type_id',
    ];

 Public function tag_type()
    {
        return $this->belongsTo(TagType::class);
    }

}
