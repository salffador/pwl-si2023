<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     * 
     * @return View
     */
    public function index(): View
    {
        $product = new Product();
        $products = $product->get_product()
                            ->latest()
                            ->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * create
     * 
     * @return View
     */
    public function create(): View
    {
        $product = new Product();
        $supplier = new Supplier();

        $data['categories'] = $product->get_product_category()->get();
        $data['supplier_'] = $supplier->get_supplier()->get();

        return view('products.create', compact('data'));
    }

    /**
     * store
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'image'                 => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'                 => 'required|min:5',
            'product_category_id'   => 'required|integer',
            'supplier_id'           => 'required|integer',
            'description'           => 'required|min:10',
            'price'                 => 'required|numeric',
            'stock'                 => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->store('public/images');

            Product::create([
                'image'               => $image->hashName(),
                'title'               => $request->title,
                'product_category_id' => $request->product_category_id,
                'description'         => $request->description,
                'supplier_id'         => $request->supplier_id,
                'price'               => $request->price,
                'stock'               => $request->stock,
            ]);

            return redirect()->route('products.index')->with(['success' => 'Data Telah Disimpan']);
        }

        return redirect()->route('products.index')->with(['error' => 'Data gagal Disimpan']);
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $product_model = new Product;
        $product = $product_model->get_product()->where("products.id", $id)->firstOrFail();

        return view('products.show', compact('product'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $product_model = new Product;
        $data['product'] = $product_model->get_product()->where("products.id", $id)->firstOrFail();

        $supplier_model = new Supplier;

        $data['categories'] = $product_model->get_product_category()->get();
        $data['supplier_'] = $supplier_model->get_supplier()->get();

        return view('products.edit', compact('data'));
    }

    /**
    * update
    * 
    * @param  mixed $request
    * @param  mixed $id
    * @return RedirectResponse
    */
    public function update(Request $request, $id): RedirectResponse
    {
    $request->validate([
        'image'        => 'image|mimes:jpeg,jpg,png|max:2048',
        'title'        => 'required|min:5',
        'description'  => 'required|min:10',
        'price'        => 'required|numeric',
        'stock'        => 'required|numeric'
    ]);

    $product_model = new Product;
    $product = $product_model->get_product()->where("products.id", $id)->firstOrFail();

    if ($request->hasFile('image')) {

        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());

        Storage::delete('public/images/' . $product->image);

        $product->update([
            'image'               => $image->hashName(),
            'title'               => $request->title,
            'product_category_id' => $request->product_category_id,
            'supplier_id'         => $request->supplier_id,
            'description'         => $request->description,
            'price'               => $request->price,
            'stock'               => $request->stock,
        ]);

    } else {
        $product->update([
            'title'               => $request->title,
            'product_category_id' => $request->product_category_id,
            'supplier_id'         => $request->supplier_id,
            'description'         => $request->description,
            'price'               => $request->price,
            'stock'               => $request->stock,
        ]);
    }
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
    * destroy
    * 
    * @param mixed $id
    * @return RedirectResponse
    */
    public function destroy($id): RedirectResponse
    {

        $product_model = new Product;
        $product = $product_model->get_product()->where("products.id", $id)->firstOrFail();

        Storage::delete('public/images/' . $product->image);

        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}