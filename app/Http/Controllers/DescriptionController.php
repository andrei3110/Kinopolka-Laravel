<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Participant;
use App\Models\Country;
use App\Models\Year;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DescriptionController extends Controller
{
    public function description(Request $request)
    {
        $id = $request->route('id');
        $categories = Category::all();
        
        $item = Item::find($id);
        $year = Year::find($item->year_id);
        $genres = [];
        $participants = [];
        $countries = [];
        $allParticipants = Participant::take(7)->get();
        foreach ($item->genres as  $genre) {

            $object = Genre::find($genre->pivot->genre_id);

            array_push($genres, $object->title);
        }
        foreach ($item->participants as  $participant) {

            $object = Participant::find($participant->pivot->participant_id);
            foreach ($allParticipants as  $value) {
                if($object->id == $value->id)
                array_push($participants, $object);
            }
           
        }
        foreach ($item->countries as  $country) {

            $object = Country::find($country->pivot->country_id);
            // echo $object;
            array_push($countries, $object->title);
        }
        $rates= Rate::all();
        return view('items.show', [
            'categories' => $categories,
            'item' => $item,
            'rates'=>$rates,
            'year' => $year,
            'genres' => $genres,
            'countries' => $countries,
            'participants' => $participants,
            
        ]);
    }
}
