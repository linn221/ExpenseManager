<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        // make sure a user cannot access categorys that does not belong to him
        $this->authorizeResource(Category::class, 'category');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Auth::user()->categories()
        // eager loading count
        ->withCount('items')
        // sorting
        ->when($request->has('order') && in_array($request->order, ['name', 'id']),
            fn($query) => $query->orderBy($request->order, $request->has('desc') ? 'desc' : 'asc'));
        $categories = $query->get();
        return view('categories.index', compact('categories'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // @refactor, something like Auth::user()->category()->create....
        $category = Category::create([
            'name' => $request->name,
            'user_id' => Auth::id()
        ]);

        return to_route('category.index')
            ->with('status', 'category created');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update(['name' => $request->name]);
        return to_route('category.index')
            ->with('status', 'category updated');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('category.index')
            ->with('status', 'item deleted');
        //
    }
}
