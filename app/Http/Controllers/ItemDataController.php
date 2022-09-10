<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Coloroption;
use App\Models\Sizeoption;
use App\Models\Weightoption;
use App\Models\Categoryitem;
use App\Models\Brand;

class ItemDataController extends Controller
{
    public function colorotions()
    {
        $colorotions = Coloroption::all();

        return response()->json($colorotions);
    }

    public function sizeoptions()
    {
        $sizeoption = Sizeoption::all();

        return response()->json($sizeoption);
    }

    public function weightoptions()
    {
        $weightoptions = Weightoption::all();

        return response()->json($weightoptions);
    }

    public function categoryitems()
    {
        $categoryitems = Categoryitem::all();

        return response()->json($categoryitems);
    }
    
public function brands()
    {
        $brands = Brand::all();

        return response()->json($brands);
    }
   
}
