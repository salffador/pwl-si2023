<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() : View
    {
        $transaction = new Transaction;
        $transactions = $transaction->get_transaction()
                            ->latest()
                            ->paginate(10);
        foreach ($transactions as $transaction) {
            $transaction->total_harga = $transaction->harga * $transaction->jumlah;
        }

        return view('transaction.index', compact('transactions'));    
    }
}





