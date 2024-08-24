<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'sku',
        'price',
        'qty'
    ];

    public function components()
    {
        return $this->hasMany(Bom::class, 'parent_product_id');
    }

    public function parentOf()
    {
        return $this->hasMany(Bom::class, 'component_product_id');
    }
}
