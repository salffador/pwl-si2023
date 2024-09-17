<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function get_product(){
        //get all products
        $sql = $this->select("products.*", "product_details.product_category_name as product_category_name")
                    ->join('product_details', 'product_details.id', '=', 'products.product_category_id');

        return $sql;
    }
}
