<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Participant;
use App\Models\Year;
use App\Models\Rate;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $participants = Participant::all();
        $categories = Category::all();
       
        $subscribeItems = Item::where('status', 'подписка')->get(); 
        return view('index', [
            'popular'=>"popular",
            'subscribe'=>"subscribe",
            'new'=>"new",
            'items' => $items,
            'categories'=>$categories,
            'subscribeItems'=>$subscribeItems,
            'participants'=>$participants,
        ]);
    }
    public function create()
    { 
        $categories = Category::all();
        $years = Year::all();
        $participants = Participant::all();
        $genres = Genre::all();
        $countries = Country::all();
        return view('items.create',[
            'categories'=>$categories,
            'genres'=>$genres,
            'years'=>$years,
            'countries'=>$countries,
            'participants'=>$participants,
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('image')->getClientOriginalName();
        
        $request->image->move(public_path('actorsImg'),$name);

        Participant::create([
            'name' => $request->name,
            'image' => $name,
        ]);
        return redirect()->route('genre.create');
    }

    public function store(Request $request)
    {   
  
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
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
            'year_id' => $request->year,
            'description' => $request->description,
            'status' => $request->status,            
            'category_id'=>$request->type
        ]);
        //sync - удаляет предыдущие записи // attach - создает новую запись
        $item->genres()->attach($request->check);
        $item->countries()->attach($request->check_country);
        $item->participants()->attach($request->check_participants);
        return redirect()->route('items.create');
    }
   
}
