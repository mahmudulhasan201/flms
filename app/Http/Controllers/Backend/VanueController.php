<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vanue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VanueController extends Controller
{
    public function vanueList(){
        return view('backend.pages.vanue.vanueList');
       }

       public function vanueForm(){
        return view('backend.pages.vanue.vanueForm'); 
       }

       public function submitVanueForm(Request $request){

        $cheeckValidation=Validator::make($request->all(),[
            'vanue_name'=>'required',
            'vanue_location'=>'required',
        ]);

        if($cheeckValidation->fails()){
            notify()->error($cheeckValidation->getMessageBag());
            return redirect()->back();
        }

        Vanue::create([
            'vanueName'=>$request->vanue_name,
            'vanueLocation'=>$request->vanue_location,
        ]);
        notify()->success('Create Successful');
        return redirect()->back(); 
       }
}
