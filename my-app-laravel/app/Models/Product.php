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
        'quantity',
        'price',
        'image',
        'cost',
        'brand',
        'category',
        'created_at',
        'updated_at'

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated' => 'datetime',
    ];

    public function getProducts(string $search = null)
    {
        $product = $this->where(function ($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%$search%");
                $query->orwhere('description', 'LIKE', "%$search%");
                $query->orwhere('brand', 'LIKE', "%$search%");
                $query->orwhere('category', 'LIKE', "%$search%");
            }
        })->paginate(5);

        return $product;
    }
}
