<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'transaction_date', 
        'cashier_name', 
        'product_id', 
        'purchase_amount'
    ];

    public function get_transaction()
    {
        $sql = $this->select("purchase_amount.*","products.title", "products.price",
                            "product_category.product_category_name as product_category_name",
                            DB::raw("(purchase_amount*price) as total")) //, DB::raw("(jumlah_pembelian*price) as total_harga")
                            ->join("products", "transaction.product_id", "=", "products.id")
                            ->join('product_category', 'product_category.id', '=', 'products.product_category_id');

        return $sql;
    }
}