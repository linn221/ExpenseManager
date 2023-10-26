<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Auth::user()->expenses;
        return view('expenses.index', compact('expenses'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $expense = Expense::create($request->only(['user_id', 'item_id', 'quantity', 'date', 'note']));
        // @refactor
        $expense->cost = $expense->item->price * $expense->quantity;
        $expense->save();
        return to_route('expense.index')
        ->with('status', 'new expense stored');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->only(['item_id', 'quantity', 'date', 'note']));
        // duplicate code
        $expense->cost = $expense->item->price * $expense->quantity;
        $expense->save();
        return to_route('expense.index')
        ->with('status', 'expense updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return to_route('expense.index')
        ->with('status', 'expense destroyed');
        //
    }
}
