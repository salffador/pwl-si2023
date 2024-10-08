<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; // Import Builder

class Supplier extends Model
{
    use HasFactory;

        /**
     * fillable
     *
     * @var array
     */
    // protected $fillable = [
    //     'supplier_name',
    //     'pic_supplier',
    // ];

    protected $table = 'suppliers';

    /**
     * Get a query builder instance for all suppliers.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get_supplier(): Builder
    {
        // Return a query builder instance for all suppliers without executing the query
        return $this->newQuery()->select("suppliers.*")->latest(); // Returns a query builder
    }
}
