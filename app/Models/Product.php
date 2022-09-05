<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'short_description',
        'slug',
        'price',
        'special_price',
        'special_price_type	',
        'special_price_start	',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'brand_id'

    ];

    /**
     * The roles that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
    public function getActive(){
        return   $this->is_active==1 ? 'مفعل' : 'غير مفعل';
       }
       public function options()
       {
           return $this->hasMany(Option::class);
       }
       public function images()
       {
           return $this->hasMany(Image::class);
       }
}
