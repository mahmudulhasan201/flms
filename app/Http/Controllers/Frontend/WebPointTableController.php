<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PointTable;
use Illuminate\Http\Request;

class WebPointTableController extends Controller
{
    public function webPointTable(){
    $varPointTable = PointTable::with(['league', 'team'])->get();
    
    // Sort the data by points in descending order
    $varPointTable = $varPointTable->sortByDesc('points');

    $groupedByLeague = $varPointTable->groupBy('league.leagueName');
    
    return view('frontend.pages.webPointTable.webPointTable', compact('groupedByLeague'));
    }
}
