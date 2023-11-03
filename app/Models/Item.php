<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'deleted'
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    use HasFactory, SoftDeletes;
}
