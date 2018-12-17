<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model
{
    use SoftDeletes;
    use HasMediaTrait;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'price_per_unit',
        'unit',
        'currency',
        'weight',
        'weight_unit',
        'manufactured_in',
        'stock',
        'description',
        'short_description',
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
