<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviewer extends Model
{
    use HasFactory;

    protected $table = 'review';
    protected $primaryKey ='id';
    protected $guarded =[];

     // quan hệ 1-n t dùng hasMany
     public function products(){
        return $this-> belongsTo(Product::class, 'product_id','id');
    }
}
