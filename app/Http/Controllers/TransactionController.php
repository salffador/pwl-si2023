<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Product; // Tambahkan ini untuk mengambil data produk

class TransactionController extends Controller
{
    public function index() : View
    {
        $transaction = new Transaction;
        $transactions = $transaction->get_transaction()
                            ->latest()
                            ->paginate(10);
        foreach ($transactions as $transaction) {
            $transaction->total_harga = $transaction->product_price * $transaction->jumlah_pembelian;
        }

        return view('transaction.index', compact('transactions'));    
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        $transaction_model = new Transaction;

        $transaction = $transaction_model->get_transaction()
            ->where("transactions.id", $id)
            ->firstOrFail();

        $transactionDetails = $transaction->get_detail_transaction()->get();
        $total_harga = 0;
        foreach ($transactionDetails as $detail) {
            $total_harga += $detail->jumlah_pembelian * $detail->product_price;
        }
        $transaction->total_harga = $total_harga;
        return view('transaction.show', compact('transaction', 'transactionDetails'));
    }

    /**
     * create
     * 
     * @return View
     */
    public function create(): View
    {
        $products = Product::all();
        return view('transaction.create', compact('products'));
    }

    /**
     * store
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $transaction = new Transaction;
        $transaction->nama_kasir = $request->nama_kasir;
        $transaction->tanggal_transaksi = $request->tanggal_transaksi;
        $transaction->save();


        foreach ($request->items as $item) {
            $detail = new DetailTransaction();
            $detail->transaction_id = $transaction->id;
            $detail->products_id = $item['id'];
            $detail->jumlah_pembelian = $item['quantity'];
            $detail->save();
        }

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $transaction = Transaction::find($id);
        $products = Product::all();

        $transactionDetails = $transaction->get_detail_transaction()->get();

        return view('transaction.edit', compact('transaction', 'products', 'transactionDetails'));
    }

    /**
     * update
     * 
     * @param Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {

        $transaction = Transaction::find($id);
        $transaction->nama_kasir = $request->nama_kasir;
        $transaction->tanggal_transaksi = $request->tanggal_transaksi;
        $transaction->save();

        DetailTransaction::where('transaction_id',  $transaction->id)->delete();

        foreach ($request->items as $item) {
            $detail = new DetailTransaction();
            $detail->transaction_id = $transaction->id;
            $detail->products_id = $item['id'];
            $detail->jumlah_pembelian = $item['quantity'];
            $detail->save();
        }

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil diupdate!');
    }

    /**
     * destroy
     * 
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        Transaction::destroy($id);
        DetailTransaction::where('transaction_id',  $id)->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}

