<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $supplier = new Supplier;
        $suppliers = $supplier->get_supplier()->paginate(10); // Fetch and paginate suppliers

        // Render view with suppliers
        return view('suppliers.index', compact('suppliers'));                    
    }
}
