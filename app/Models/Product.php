<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'product_category_id',
        'supplier_id',
        'description',
        'price',
        'stock',
    ];

    public function get_product(){
        $sql = $this->select("products.*", "product_category.product_category_name as product_category_name", "supplier.supplier_name")
                    ->join('product_category', 'product_category.id', '=', 'products.product_category_id')
                    ->join('supplier', 'supplier.id', '=', 'products.supplier_id');

        return $sql;
    }

    public function get_product_category(){
        $sql = DB::table('product_category')->select('*');

        return $sql;
    }


public $timestamp = true;

public static function storeProduct($request, $image)
{
    return self::create([
                'image'               =>$image->hashName(),
                'title'               =>$request->title,
                'product_category_id' =>$request->product_category_id,
                'description'         =>$request->supplier_id,
                'supplier_id'         =>$request->description,
                'price'               =>$request->price,
                'stock'               =>$request->stock,
    ]);
}

}