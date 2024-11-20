<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $table = 'detail_transaction';

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'products_id',
        'jumlah_pembelian'
    ];
    public $timestamps = false;

}
