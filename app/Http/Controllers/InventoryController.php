<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        foreach ($inventories as $inventory)
        {
            echo $inventory->product->name." ___ ".$inventory->quantity." ___ ".$inventory->product->units->name."<br/><br/>" ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view("createInventory")->with(["products"=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        // $unit = Unit::find($request->unit_id);
        Inventory::create( array_merge($request->all(), ["unit_id"=>$product->units->id]));
        return "product inserted into storehouse correctlly";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory, Request $request)
    {
        echo $inventory->product->name." ___ ".$inventory->quantity." ___ ".$inventory->product->units->name."<br/><br/>" ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view("createInventory")->with(["inventory"=>$inventory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $updatedInventory = Inventory::find($inventory->id);
        $updatedInventory->quantity = $request->quantity;
        $updatedInventory->save();
        return "Inventory updated successfully" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory=inventory::find($inventory->id);
        $inventory->delete();
        return "inventory deleted successfully" ;
    }
}
