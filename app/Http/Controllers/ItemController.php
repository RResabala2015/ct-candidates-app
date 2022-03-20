<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Return all Items with Inertia
        return Inertia::render('Items/Index',[
            'items' => Item::latest()
            ->where('name', 'LIKE',"%$request->q%")
            ->get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create Item
        return Inertia::render('Items/Create');

    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Models\Item $item
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {
     //Save new Item
      $request->validate([
            'name' => 'required',
        ]);
        $item = Item::create($request->all());
        return redirect()->route('items.index')->with('status', 'Item created');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //To show the activity details
        return Inertia::render('Items/Show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Item $item
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //Edit Activity
        return Inertia::render('Items/Edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'id',
            'name',
            'completed'
        ]);


        //Update items
        $item->update($request->all());
        return redirect()->route('items.index')->with('status', 'Item updated');
        
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Item $item
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('status', 'Item deleted');

    }
}
