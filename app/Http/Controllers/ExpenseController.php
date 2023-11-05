<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Models\Item;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Expense::class, 'expense');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->user()->expenses()
            // sorting
            ->when(
                $request->has('order') && in_array($request->order, ['id', 'item_id', 'cost', 'quantity', 'note']),
                fn ($query) => $query->orderBy($request->order, $request->has('desc') ? 'desc' : 'asc')
            );
        $expenses = $query->get();
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
        if ($request->item_id == 0) {
            // if the item is new, create it and get the item
            $item = Item::create([
                'user_id' => $request->user()->id,
                'name' => $request->item_name,
                'price' => $request->item_price,
                'category_id' => $request->category_id
            ]);
            $request->merge(['item_id' => $item->id]);
        } else {
            $item = Item::findOrFail($request->item_id);
            if ($request->boolean('overwrite')) {
                // updating the item
                $item->update([
                    'name' => $request->item_name,
                    'price' => $request->item_price,
                    'category_id' => $request->category_id
                ]);
            } else {
                // setting item price temporary only for this expense record
                $item->price = $request->item_price;
            }
        }

        $cost = $item->price * $request->quantity;
        // merging the data for expense that is not inside the request
        $request->merge(['user_id' => $request->user()->id]);
        $request->merge(['cost' => $cost]);
        
        // creating the expense after getting all required data
        $expense = Expense::create($request->only(['user_id', 'item_id', 'quantity', 'cost', 'date', 'note']));
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
