<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalFormController extends Controller
{
    public function personalForm(){

        return view('backend.pages.personalform.personalinfo');
        
        
    }

    public function storePersonalForm(Request $request){
        // dd($request);

        Personal::create([
            'name'=>$request->name,
            'fathersName'=>$request->fathersName,
            'mothersName'=>$request->mothersName,
            'address'=>$request->address,
        ]);

        return redirect()->route('dashboard');

    }
}
