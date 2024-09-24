<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    public function get_transaction(){
        //get all transaction
        $sql = $this->select("transaction.*", "product_details.product_category_name as product_category_name")
                    ->join('products', 'products.id', '=', 'transaction.product_id')
                    ->join('product_details', 'product_details.id', '=', 'transaction.product_id');
        return $sql;
    }
    

    public $timestamps = true;
}
