<?php

namespace App\Observers;

use App\Models\Expense;

class ExpenseObserver
{
    public function saving(Expense $expense): void
    {
        // logger("old cost: " . $expense->getOriginal('cost'));
        // logger("new cost: " . $expense->cost);
        // get the original attribute value before saving to the database, decrease by it, then increase by new value
        $expense->user()->increment('balance', $expense->getOriginal('cost'));
        $expense->user()->decrement('balance', $expense->cost);
        //
    }

    /**
     * Handle the Expense "deleted" event.
     */
    public function deleted(Expense $expense): void
    {
        $expense->user()->increment('balance', $expense->cost);
        //
    }

    /**
     * Handle the Expense "restored" event.
     */
    public function restored(Expense $expense): void
    {
        //
    }

    /**
     * Handle the Expense "force deleted" event.
     */
    public function forceDeleted(Expense $expense): void
    {
        //
    }
}
