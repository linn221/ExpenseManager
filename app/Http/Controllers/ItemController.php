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
    public function __construct()
    {
        // make sure a user cannot access items that does not belong to him
        $this->authorizeResource(Item::class, 'item');
    }

    public function index()
    {
        $items = Auth::user()->items()->with('category')->withCount('expenses')->get();
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
        return to_route('item.index')
        ->with('status' ,'Item stored');
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
        return to_route('item.index')
        ->with('status' ,'Item updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return to_route('item.index')
        ->with('status', 'item destroyed');
        //
    }
}
