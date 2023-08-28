<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function create()
    {
        return view('items.create');
    }
    public function index()
    {
        $items = Item::all();
        return view('index', [
            'items' => $items
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'country' => 'required',
            'year' => 'required',
            'description' => 'required',
            'genre' => 'required',
        ]);

        $name = $request->file('image')->getClientOriginalName();
        
        $request->image->move(public_path('img'),$name);    
        
        
        Item::create([
            'name' => $request->name,
            'image' => $name,
            'country' => $request->country,
            'year' => $request->year,
            'description' => $request->description,
            'genre' => $request->genre,
        ]);

        return redirect()->route('items.create');
    }
}
