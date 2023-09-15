<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Math;
// use App\Http\Controllers\Undefined;
use Mockery\Undefined;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        // $id = $request->route('id');
        $this->validate($request, [
            'rate' => 'required',
        ]);

        $yourRate = Rate::where([['item_id', '=', $request->item_id], ['user_id', '=', $request->user_id]]);
        $yourRate1 = Rate::where([['item_id', '=', $request->item_id], ['user_id', '=', $request->user_id]])->get();
        if (count($yourRate1) == 0) {
            $rates = Rate::create([
                'rate' => $request->rate,
                'user_id' => $request->user_id,
                'item_id' => $request->item_id
            ]);
            
        } else {
            $yourRate->update([
                'rate' => $request->rate,
            ]);
           
        }
        $data = Rate::all();

        $summ = 0;
        $count = 0 ;

        for($i=0; $i < count($data); $i++) { 
            $summ = $summ + $data[$i]->rate;
            $count = $i + 1;
        }

        $average = $summ / $count;
        $rounded = round($average, 1);

        $mass = [true,$rounded,$count];
        return response()->json($mass);
    }
}
