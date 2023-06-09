<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDetail;
use App\Models\ProductReviewer;
use App\Models\Manufactures;
use App\Models\ProductProtypes;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey ='id';
    protected $guarded =[];
    //quan hệ 1-1 ta dùng belongTo
    public function manufactures(){
        return $this-> belongsTo(Manufactures::class, 'manu_id', 'id');
    }

    public function productProtypes(){
        return $this-> belongsTo(productProtypes::class, 'type_id', 'id');
    }

    public function productDetail(){
        return $this->hasMany(ProductDetail::class,'product_id','id');   }

    public function productReviewer(){
        return $this->hasMany(ProductReviewer::class,'product_id','id');
    }

    public function orderDetail(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    
    
}
