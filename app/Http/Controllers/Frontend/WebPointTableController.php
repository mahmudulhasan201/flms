<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PointTable;
use Illuminate\Http\Request;

class WebPointTableController extends Controller
{
    public function webPointTable(){
        $varPointTable=PointTable::all();
        return view('frontend.pages.webPointTable.webPointTable',compact('varPointTable'));
    }
}
