<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * index
     * 
     * @return void
     */

    public function index() : view
    {
        $suppliers = Supplier::latest()->paginate(10);

        return view('supplier.index', compact('suppliers'));

    }
}