<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProtypes extends Model
{
    use HasFactory;

    protected $table = 'protypes';
    protected $primaryKey ='id';
    protected $guarded =[];
    // quan hệ 1-n t dùng hasMany
    public function products(){
        return $this-> hasMany(Product::class, 'type_id','id');
    }
}
