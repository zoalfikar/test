<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
use App\Models\Image;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_id'
    ];

    protected $appends = [
        'total_quantity',
        'image_path',
    ];

    public function units()
    {
        return $this->belongsTo('App\Models\Unit','unit_id');
    }

    public function getTotalQuantityAttribute()
    {
        return Inventory::where("product_id" ,$this->id )->sum('quantity');
    }

    public function getImagePathAttribute()
    {
        $image = Image::where('o_type','product')->where('o_id',$this->id)->first();

        if ($image) {
            return $image->path;
        } else {
            return null;
        }
        
       
    }

}
