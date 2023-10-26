<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Auth::user()->items()->with('category')->get();
        return view('items.index', compact('items'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $item = Item::create($request->only(['name', 'price', 'category_id', 'user_id']));
        return to_route('item.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return $item;
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->update($request->only(['name', 'price', 'category_id']));
        return to_route('item.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return to_route('item.index');
        //
    }
}
