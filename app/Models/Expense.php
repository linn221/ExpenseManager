<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Expense extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        'date',
        'note',
        'user_id',
        'cost'
    ];
    protected $attributes = [
        'cost' => 0
    ];

    public function item()
    {
        return $this->belongsTo(Item::class)
        ->withDefault([
            'name' => 'deleted',
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
