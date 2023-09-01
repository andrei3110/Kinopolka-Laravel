<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories(Request $request)
    {
        $id = $request->route('id');
        $categories = Category::all();
        $items = Category::find($id)->items;
       
        return view('types.index', [
            'BestBovik'=>"BestBovik",
            'new'=>"new",
            'items' => $items,
            'categories'=>$categories,


        ]);
    }
}
