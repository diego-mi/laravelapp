<?php

namespace App\Http\Controllers;

use App\Category;
use App\Source;
use App\Transaction;
use Illuminate\Http\Request;
use Auth;

class TransactionController extends Controller
{

    const ARR_TYPES = ['Dinheiro', 'Cartão de Crédito', 'Conta Corrente', 'Empréstimo', 'Transferência'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['transactions'] = Transaction::with(['category', 'source', 'user'])->get();;
        return view('transactions.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['sources'] = Source::all();
        $data['types'] = self::ARR_TYPES;

        return view('transactions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'prince' => 'required',
            'due_date' => 'required',
            'type' => 'required',
            'source_id' => 'required',
            'category_id' => 'required',
        ]);

        $data = [
            'description' => $request->description,
            'prince' => $request->prince,
            'prince_paid' => $request->prince,
            'due_date' => $request->due_date,
            'payment_date' => $request->due_date,
            'type' => $request->type,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'source_id' => $request->source_id
        ];

        $save = Transaction::insert($data);

        if ($save) {
            return redirect('transactions');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
