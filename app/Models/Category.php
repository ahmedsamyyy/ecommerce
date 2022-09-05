<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','is_active','parent_id'];


    public function getActive(){
     return   $this->is_active==1 ? 'مفعل' : 'غير مفعل';
    }
    public function scopeParent($query){
        $query->whereNull('parent_id');
       }
       public function scopechild($query){
        $query->whereNotNull('parent_id');
       }
       public function _parent()
       {
           return $this->belongsTo(Category::class, 'parent_id');
       }
       /**
        * The roles that belong to the Category
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
        */
       public function products()
       {
           return $this->belongsToMany(Product::class, 'product_category');
       }
       public function scopeActive($query){
        return $query->where('is_active',1);

    }
}
