<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=['name','photo','is_active'];

    public function getActive(){
        return   $this->is_active==1 ? 'مفعل' : 'غير مفعل';
       }
       public function product()
       {
           return $this->hasMany(product::class, 'product_id', 'id');
       }
       public function scopeActive($query){
           return $query->where('is_active',1);

       }
}
