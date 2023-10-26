<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        'date',
        'note',
        'user_id'
    ];
    protected $attributes = [
        'cost' => 0
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    use HasFactory;
}
