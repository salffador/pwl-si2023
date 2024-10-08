<?php

namespace App\Http\Controllers;

//Import model transaction
use App\Models\Transaction;

//Import return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Index
     * 
     * @return void
     */
    public function index() : view
    {
        $transaction = new Transaction;
        $transactions = $transaction->get_transaction()->latest()->paginate(10);;

        //render view with transactions
        return view('transactions.index', compact('transactions'));              //data      
    }
}
