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
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Undefined;
use Mockery\Undefined;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $id = $request->route('id');
        $this->validate($request, [
            'rate' => 'required',
        ]);

        $yourRate = Rate::where([['item_id', '=', $id], ['user_id', '=', Auth::user()->id]]);
        $yourRate1 = Rate::where([['item_id', '=', $id], ['user_id', '=', Auth::user()->id]])->get();
       
        if ( count($yourRate1) == 0) {
            Rate::create([
             'rate' => $request->rate,
             'user_id' => Auth::user()->id,
             'item_id' => $id
         ]);
          
        } else {
            $yourRate->update([
                'rate' => $request->rate,
            ]);
        }

        return redirect()->route('description',[$id]);
    }
}
