<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function get_transaction(){
        $sql = $this->select("transactions.*", "product_category.product_category_name as product_category_name", 
                            "products.title as product_name", "products.price as product_price")
                    ->join('products', 'products.id', '=', 'transactions.products_id')
                    ->join('product_category', 'product_category.id', '=', 'products.product_category_id');
        return $sql;
    }
}
