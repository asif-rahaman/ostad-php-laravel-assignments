<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
        ]);
    
        $income = new Income([
            'user_id' => auth()->id(),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'category' => $request->input('category'),
        ]);
    
        $income->save();
    
        return redirect()->route('income.list');
    }
    
}
