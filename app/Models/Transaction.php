<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'nama_kasir',
        'tanggal_transaksi',
    ];

    /**
     * 
     */
    public function get_transaction()
    {
        return $this->select("*");
    }


    /**
     * 
     */
    public function get_detail_transaction()
    {
        return $this->select("transactions.*", 
                             "product_category.product_category_name as product_category_name", 
                             "products.id as product_id", 
                             "products.title as product_name", 
                             "products.price as product_price",
                             "detail_transaction.jumlah_pembelian as jumlah_pembelian")
                    ->join('detail_transaction', 'detail_transaction.transaction_id', '=', 'transactions.id')
                    ->join('products', 'products.id', '=', 'detail_transaction.products_id')
                    ->join('product_category', 'product_category.id', '=', 'products.product_category_id')
                    ->where(['transactions.id' => $this->id]);
    }
}
