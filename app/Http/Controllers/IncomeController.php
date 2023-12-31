<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Income::class, 'income');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Auth::user()->incomes()
            // @later, date should be casted
            // sorting
            ->when($request->has('order') && in_array($request->order, ['id', 'label', 'amount']),
                fn ($query) => $query->orderBy($request->order, $request->has('desc') ? 'desc' : 'asc')
            );
        $incomes = $query->get();
        return view('incomes.index', compact('incomes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incomes.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $income = Income::create($request->only(['user_id', 'amount', 'label', 'date', 'note']));

        return to_route('income.index')
            ->with('status', 'income stored');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->update($request->only(['amount', 'label', 'note', 'date']));
        return to_route('income.index')
            ->with('status', 'income updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return to_route('income.index')
            ->with('status', 'income destroyed');
        //
    }
}
