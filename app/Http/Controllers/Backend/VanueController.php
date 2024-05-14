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

       //Edit 
       public function venueEdit($edit_id){
        $editVenue = Venue::find($edit_id);
        return view('backend.pages.vanue.venueEdit',compact('editVenue'));
       }

       public function venueUpdate(Request $request,$update_id){
        $updateVenue= Venue::find($update_id);

        $cheeckValidation=Validator::make($request->all(),[
            'venue_name'=>'required',
            'venue_location'=>'required',
        ]);

        if($cheeckValidation->fails()){ 
            notify()->error($cheeckValidation->getMessageBag());
            return redirect()->back();
        }

        $updateVenue->update([
            'venueName'=>$request->venue_name,
            'venueLocation'=>$request->venue_location,
        ]);
        notify()->success('Create Successful');
        return redirect()->route('venue.list');
       }
       
       
       
       //View
       public function venueView($view_id){
        $viewVenue= Venue::find($view_id);
        return view('backend.pages.vanue.venueView',compact('viewVenue'));
       }

       //Delete
       public function venueDelete($v_id){
        $deleteVenue= Venue::find($v_id);
        $deleteVenue->delete();

        notify()->success('Deleted successfully'); 
        return redirect()->back();
       }
    
}
