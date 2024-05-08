<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list()
    {
        $categories=Category::paginate(5);
        return view('backend.pages.category.list',compact('categories'));
    }

    public function form()
    {
        return view('backend.pages.category.form');
    }

    public function submitForm(Request $request){

        $checkValidation=Validator::make($request->all(),[
            'categoryName'=>'required',
            'description'=>'required', 
        ]);
        if($checkValidation->fails()){
            // notify()->error("something went wrong");
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();

        }

        $img = $request->image;
        $category_image='IMG' . '-' . date('YmdHis'). '.'.$img->getClientOriginalExtension();

        // dd($category_image);

        if($request->hasFile('image'))
        {
            $img->storeAs('/categories',$category_image);
        }

        Category::create([
            'categoryName'=>$request->categoryName,
            'descriotion'=>$request->description,
            'image'=>$category_image,
        ]);
        // return redirect()->back();

        notify()->success('create successful');
        return redirect()->route('category.form');
    }

}
 