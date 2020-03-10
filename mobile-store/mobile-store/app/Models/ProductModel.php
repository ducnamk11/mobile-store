<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table= 'vp_products';
    protected $primaryKey= 'prod_id';
    protected $guarded= [];
}
