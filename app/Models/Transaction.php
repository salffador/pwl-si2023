<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'id_products',
        'jumlah_pembelian',
        'nama_kasir',
        'tanggal_transaksi',
    ];

    /**
     * Relationship with Product
     *
     *  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function get_transaction()
    {
        $sql = $this->select("transactions.*","products.title", "products.price", "category_product.product_category_name as product_category_name",
                        DB::raw("(jumlah_pembelian*price) as total_harga"))
                    ->join("products", "products.id", "=", "transactions.id_products")
                    ->join('category_product', 'category_product.id', '=', 'products.product_category_id');

                    return $sql;
    }
}
