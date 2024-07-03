<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')->get();
        //dd($items);
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request) 
    {
        // Haalt de gevalideerde gegevens op uit de StoreItemRequest class
        $validated = $request->validated();
    
        // Maakt een nieuw item aan met de gevalideerde gegevens
        Item::create($validated);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    // De Request class wordt vervangen door de UpdateItemRequest
    public function update(UpdateItemRequest $request, Item $item) 
    {
         // Haalt de gevalideerde gegevens op uit de UpdateItemRequest class
        $validated = $request->validated();

         // Werkt het item bij met de gevalideerde gegevens
         $item->update($validated);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
