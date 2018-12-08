<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'unit',
        'weight',
        'manufactured_in',
        'stock',
        'description',
        'extra_description',
    ];

    /**
     * Get all categories this product is in.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\ProductCategory');
    }
}
