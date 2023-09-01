<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();

        $subscribeItems = Item::where('status', 'подписка')->get(); 
        return view('index', [
            'popular'=>"popular",
            'subscribe'=>"subscribe",
            'new'=>"new",
            'items' => $items,
            'categories'=>$categories,
            'subscribeItems'=>$subscribeItems,
        ]);
    }
    public function create()
    { 
        $categories = Category::all();
        $genres = Genre::all();
        return view('items.create',[
            'categories'=>$categories,
            'genres'=>$genres,
        ]);
    }
    public function genre_create()
    {   
        $categories = Category::all();
        return view('items.create_genre',[
            'categories'=>$categories,
        ]);
    }
    
    public function genre_store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        Genre::create([
            'title' => $request->title,
        ]);

        return redirect()->route('genre.create');
    }

    public function store(Request $request)
    {   
  
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'country' => 'required',
            'year' => 'required',
            'description' => 'required',
            'status' => 'required',
            'type'=>'required'
        ]);

        $name = $request->file('image')->getClientOriginalName();
        
        $request->image->move(public_path('img'),$name);
        
        $item = Item::create([
            'name' => $request->name,
            'image' => $name,
            'country' => $request->country,
            'year' => $request->year,
            'description' => $request->description,
            'status' => $request->status,            
            'category_id'=>$request->type
        ]);
        //sync - удаляет предыдущие записи // attach - создает новую запись
        $item->genres()->attach($request->check);
        return redirect()->route('items.create');
    }
   
}
