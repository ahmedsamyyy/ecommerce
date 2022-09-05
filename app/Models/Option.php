<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable=['name','price','product_id','attribute_id'];
    public function Attributes()
    {
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
