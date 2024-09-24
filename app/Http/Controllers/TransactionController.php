<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : view
    {

        $transaction = new transaction;
        $transactions = $transaction->get_transaction()
                                    ->latest()
                                    ->paginate(10);

        //render view with transactions
        return view('transaction.index', compact('transactions'));
}
}