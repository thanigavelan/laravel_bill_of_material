<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'sku',
        'price',
        'qty',
        'image_path'
    ];

    public function GetImagePath()
    {
        return env('DOMAIN_URL') . Storage::url($this->image_path);
    }

    public function components()
    {
        return $this->hasMany(Bom::class, 'parent_product_id');
    }

    public function parentOf()
    {
        return $this->hasMany(Bom::class, 'component_product_id');
    }
}
