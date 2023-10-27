<?php

namespace App\Observers;

use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class IncomeObserver
{
    /**
     * Handle the Income "created" event.
     */
    public function created(Income $income): void
    {
        $income->user()->increment('balance', $income->amount);
        //
    }

    /**
     * Handle the Income "updated" event.
     */
    public function updating(Income $income): void
    {
        // decrease by old original amount, increase new amount to be updated
        $income->user()->decrement('balance', $income->getOriginal('amount'));
        $income->user()->increment('balance', $income->amount);
        //
    }

    /**
     * Handle the Income "deleted" event.
     */
    public function deleted(Income $income): void
    {
        $income->user()->decrement('balance', $income->amount);
        //
    }
}
