<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'description',
        'o_id',
        'o_type',
    ];

    public function owner()
    {
        if ($this->o_type == "user") {
            return $this->belongsTo('App\Models\User','o_id');
        }
        if ($this->o_type == "product") {
            return $this->belongsTo('App\Models\Product','o_id');
        }
        throw new Exception(" not found", 1);

    }
}
