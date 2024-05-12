<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VanueController extends Controller
{
    public function venueList(){
        $venue= Venue::paginate(5);
        return view('backend.pages.vanue.vanueList',compact('venue'));
       }

       public function venueForm(){
        $creatVenue=Venue::all();
        return view('backend.pages.vanue.vanueForm'); 
       }

       public function submitVenueForm(Request $request){

        //Validation
        $cheeckValidation=Validator::make($request->all(),[
            'venue_name'=>'required',
            'venue_location'=>'required',
        ]);

        if($cheeckValidation->fails()){
            notify()->error($cheeckValidation->getMessageBag());
            return redirect()->back();
        }

        //Data Name Store
         Venue::create([
            'venueName'=>$request->venue_name,
            'venueLocation'=>$request->venue_location,
        ]);
        notify()->success('Create Successful');
        return redirect()->back(); 
       }

       //Edit View Delete
       public function venueDelete($v_id){
        $deleteVenue= Venue::find($v_id);
        $deleteVenue->delete();

        notify()->success('Deleted successfully'); 
        return redirect()->back();
       }
    
}
