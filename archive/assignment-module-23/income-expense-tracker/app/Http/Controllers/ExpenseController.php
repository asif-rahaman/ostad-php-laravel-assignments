<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
        ]);
    
        $expense = new Expense([
            'user_id' => auth()->id(),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'category' => $request->input('category'),
        ]);
    
        $expense->save();
    
        return redirect()->route('expense.list');
    }
}
