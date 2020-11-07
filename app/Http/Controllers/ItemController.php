<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id; // Get the id of the current logged in user.
        $items = Item::all()->where('user_id', '=', $user_id);
        return view('todos.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('todos.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item = new Item;
        $item->user_id = $request->user_id;
        $item->title = $request->title;
        $item->description = $request->description;
        $reminder = date_create_from_format('d/m/Y', $request->reminder);
        $item->reminder = $reminder->format('Y-m-d H:i:s');
        $item->save();

        $user_id = Auth::user()->id; // Get the id of the current logged in user.
        $items = Item::all()->where('user_id', '=', $user_id);

        return view('todos.index')->with(['items' => $items]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('todos.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('todos.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item_id)
    {
        $item::findOrFail($item_id);
        $item->title = $request->title;
        $item->description = $request->description;
        $reminder = date_create_from_format('d/m/Y', $request->reminder);
        $item->reminder = $reminder->format('Y-m-d H:i:s');
        $item->save();

        $user_id = Auth::user()->id; // Get the id of the current logged in user.
        $items = Item::all()->where('user_id', '=', $user_id);

        return view('todos.index')->with(['items' => $items]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($item_id)
    {
        $item = Item::findOrFail($item_id)->delete();

        return response()->json(['code' => 200]);
    }
}
