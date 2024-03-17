<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        return view('backend.pages.category.list');
    }

    public function categoryAllList(){
        $attribute = Product::all();
        return view('backend.pages.category.table',compact('attribute'));                    
    }
}
