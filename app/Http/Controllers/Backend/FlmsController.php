<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Flms;
use Illuminate\Http\Request;

class FlmsController extends Controller
{
    public function flmsStart(){
        
        return view('backend.pages.flms.flmsinfo');  
    }
    public function storeFlms(Request $request){

        Flms::create([
            'name'=>$request->name,
            'fathername'=>$request->fathersName,
            'mothername'=>$request->mothersName,
            'address'=>$request->address,

        ]);

        return redirect()->back();
    }
}
