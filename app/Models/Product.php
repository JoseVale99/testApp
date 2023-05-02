<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'barcode' => 'array',
        'precios' => 'array',
    ];

    // relacion with categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //     public function codigosBarras()
    //     {
    //         return $this->belongsToMany(Barcode::class, 'precio')
    //             ->withPivot('precio', 'estado');
    //     }
}
