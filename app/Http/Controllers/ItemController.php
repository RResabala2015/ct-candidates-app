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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return all Items with Inertia
        return Inertia::render('Items/Index',[
            'items' => Item::latest()->get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Save new Item
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();
        return $newItem;
    }

    /**
     * Display the specified resource.
     *
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update items
        $existingItem = Item::find($id);

        if($existingItem){
            $existingItem->completed =$request->item['completed']? true : false;
            $existingItem->completed_at =$request->item['completed']? Carbon::now() : null;
            $existingItem->save();
            return $existingItem;
        }
        return "Item not found | 404";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Deleted Items
        $existingItem = Item::find($id);

        if($existingItem){
            $existingItem-> delete();
            return "Item successfully deleted";
        }

        return "Item not found";
    }
}
