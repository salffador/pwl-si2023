<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';
    protected $fillable = ['supplier_name', 'supplier_address', 'pic_supplier', 'pic_number', 'image'];
    public function get_supplier(){
        $sql = $this->select("supplier.*");

        return $sql;
    }
}
