<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Year;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class CategoriesController extends Controller
{
    public function categories(Request $request)
    {
        $id = $request->route('id');
        $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();
        $years = Year::all();
        $items = Category::find($id)->items;

        return view('types.index', [
            'BestBovik' => "BestBovik",
            'new' => "new",
            'year' => 'years',
            'genre' => 'genres',
            'country' => 'countries',
            'items' => $items,
            'categories' => $categories,
            'genres' => $genres,
            'countries' => $countries,
            'years' => $years,
            'id' => $id,

        ]);
    }



    public function filter(Request $request)
    {
        $genres = Genre::all();
        $countries = Country::all();
        $years = Year::all();
        $categories = Category::all();
        $checkItem = [];
        $arr = [];
        $mass = [];
        if ($request->subscribe == true && $request->free != true) {
            $items = Item::where('status', 'подписка')->get();
        } else if ($request->free == true && $request->subscribe != true) {
            $items = Item::where('status', 'бесплатно')->get();
        } else if ($request->free == true && $request->subscribe == true) {
            $items = Item::all();
        } else {
            $items = Item::all();
        }
        if ($request->checkFilter_years != null || $request->checkFilter_genres != null || $request->checkFilter_countries != null) {
            foreach ($items as $item) {
                if ($item->category_id == $request->id) {
                    if ($request->checkFilter_years != null) {
                        foreach ($request->checkFilter_years as $year) {
                            if ($item->year_id == $year) {
                                
                                
                                array_push($checkItem, $item);
                            }
                        }
                    } else if ($request->checkFilter_genres != null) {
                        foreach ($request->checkFilter_genres as $check_genre) {
                            foreach ($item->genres as $genre) {
                                if ($genre->pivot->genre_id == $check_genre) {
                                    if ($item->category_id == $request->category_id) {
                                        echo "abcd";
                                    }
                                    array_push($checkItem, $item);
                                    break 2;
                                }
                            }
                        }
                    } else if ($request->checkFilter_countries != null) {
                        foreach ($request->checkFilter_countries as $check_country) {
                            foreach ($item->countries as $country) {
                                if ($country->pivot->country_id == $check_country) {
                                    if($item->category_id == $request->category_id){
                                        echo "==12345absc==";
                                    }
                                    array_push($checkItem, $item);
                                    break 2;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            foreach ($items as  $item) {
                array_push($arr, $item);
            }
        }

        if ($request->checkFilter_genres != null) {

            foreach ($checkItem as  $value) {

                foreach ($request->checkFilter_genres as  $check_genre) {
                    foreach ($value->genres as $genre) {
                        if ($genre->pivot->genre_id == $check_genre) {
                            if ($request->checkFilter_countries != null) {
                                array_push($mass, $value);
                            } else {
                                array_push($arr, $value);
                            }

                            break 2;
                        }
                    }
                }
            }
            if ($request->checkFilter_countries != null) {
                foreach ($mass as  $value) {
                    foreach ($request->checkFilter_countries as  $check_country) {
                        foreach ($value->countries as $country) {
                            if ($country->pivot->country_id == $check_country) {
                                array_push($arr, $value);
                                break 2;
                            }
                        }
                    }
                }
            }
        } else {
            foreach ($checkItem as  $value) {

                if ($request->checkFilter_countries != null) {
                    array_push($mass, $value);
                } else {
                    array_push($arr, $value);
                }
            }
            if ($request->checkFilter_countries != null) {
                foreach ($mass as  $value) {
                    foreach ($request->checkFilter_countries as  $check_country) {
                        foreach ($value->countries as $country) {
                            if ($country->pivot->country_id == $check_country) {
                                array_push($arr, $value);
                                break 2;
                            }
                        }
                    }
                }
            }
        }
        return view('types.movies', [
            'new' => "new",
            'year' => 'years',
            'genre' => 'genres',
            'country' => 'countries',
            'categories' => $categories,
            'items' => $arr,
            'genres' => $genres,
            'countries' => $countries,
            'years' => $years,
            'id' => $request->id,
        ]);
    }
}

// public function filter(Request $request)
//     {
//         $categories = Category::all();
//         $genres = Genre::find($request->checkFilter_genres);
//         $years = [];
//         $arr = [];
//         // $items = Item::all();
//         if ($request->subscribe == true && $request->free != true) {
//             $items = Item::where('status', 'подписка')->get();
//         } else if ($request->free == true && $request->subscribe != true) {
//             $items = Item::where('status', 'бесплатно')->get();
//         } else if ($request->free == true && $request->subscribe == true) {
//             $items = Item::all();
//         } else {
//             $items = Item::all();
//         }


//         if ($request->checkFilter_years != null) {
//             foreach ($items as  $item) {
//                 foreach ($request->checkFilter_years as $year) {
//                     if ($item->year_id == $year) {
//                         array_push($years, $item);
//                     }
//                 }
//             }
//         }


//         if ($years != null && $genres != null) {

//             foreach ($years as  $value) {
//                 if ($value != null) {

//                     foreach ($request->checkFilter_genres as  $check_genre) {
//                         foreach ($value->genres as $genre) {
//                             if ($genre->pivot->genre_id == $check_genre) {
//                                 array_push($arr, $value);
//                                 break 2;
//                             }
//                         }
//                     }
//                 } else {

//                     $arr = [];
//                 }
//             }
//         } else if ($genres == null) {
//             foreach ($items as  $item) {
//                 $year = $item->year_id;
//                 foreach ($request->checkFilter_years as  $check_year) {
//                     if ($year == $check_year) {
//                         array_push($arr, $item);
//                     }
//                 }
//             }
//         } else if($request->checkFilter_years == null){
//             foreach ($items as  $item) {
//                 foreach ($request->checkFilter_genres as  $check_genre) {
//                     foreach ($item->genres as $genre) {
//                         if ($genre->pivot->genre_id == $check_genre) {
//                             array_push($arr, $item);
//                             break 2;
//                         }
//                     }
//                 }
//             }
//         }



//         return view('types.movies', [
//             'categories' => $categories,

//             'items' => $arr,
//         ]);
//     }
