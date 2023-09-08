<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Year;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function description(Request $request)
    {
        $id = $request->route('id');
        $categories = Category::all();
        $item = Item::find($id);
        $year = Year::find($item->year_id);
        $genres = [];
        $countries = [];
        foreach ($item->genres as  $genre) {
            
            $object = Genre::find( $genre->pivot->genre_id);
            
            array_push($genres,$object->title);
        }
        foreach ($item->countries as  $country) {
            
            $object = Country::find( $country->pivot->country_id);
            // echo $object;
            array_push($countries,$object->title);
        }
        // echo $genres;
        return view('items.show',[
            'categories'=>$categories,
            'item'=>$item,
            'year'=>$year,
            'genres'=>$genres,
            'countries'=>$countries,
        ]);
    }
}
