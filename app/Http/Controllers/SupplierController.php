<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required',
            'supplier_address' => 'required',
            'pic_supplier' => 'required',
            'pic_number' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('storage/images'), $imageName);

        Supplier::create([
            'supplier_name' => $request->supplier_name,
            'supplier_address' => $request->supplier_address,
            'pic_supplier' => $request->pic_supplier,
            'pic_number' => $request->pic_number,
            'image' => $imageName,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Supplier created successfully');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_name' => 'required',
            'supplier_address' => 'required',
            'pic_supplier' => 'required',
            'pic_number' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $supplier = Supplier::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($supplier->image && file_exists(public_path('storage/images/'.$supplier->image))) {
                unlink(public_path('storage/images/'.$supplier->image));
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('storage/images'), $imageName);

            $supplier->image = $imageName;
        }

        $supplier->update($request->only(['supplier_name', 'supplier_address', 'pic_supplier', 'pic_number']));

        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);

        if ($supplier->image && file_exists(public_path('storage/images/'.$supplier->image))) {
            unlink(public_path('storage/images/'.$supplier->image));
        }

        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully');
    }
}
