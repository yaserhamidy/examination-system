<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;

class catagoryController extends Controller
{
    public function show(Request $request)
{
    $query = $request->get('query');
    $catagories = catagory::when($query, function ($q) use ($query) {
        $q->where('name', 'like', '%' . $query . '%');
    })->paginate(5);

    return view('dashboards.admins.catagory.show_catagory', compact('catagories'));
}
    public function add(){  
        return view('dashboards.admins.catagory.add_catagory');
    }
    
    
public function addCatagory(Request $request){
    $request->validate([
        'name' => 'required|string|min:3|max:255',
        'description' => 'nullable|string|max:1000', // Adjust max length as needed
    ]);

    $name = $request->name;
    $description = $request->description;
    

    $catagory = new catagory();
    
    $catagory->name = $name;
    $catagory->description = $description;

    $catagory->save();
    
    return redirect()->route('show_catagory')->with('status' , 'catagory Added Successfully!!');
   
}

public function catagoryDelete($cat_id){
        $catagory = catagory::find($cat_id);
        $catagory->delete();
         return redirect()->route('show_catagory');
} 


public function catagoryEdit($cat_id){
    $catagory = catagory::find($cat_id);
    return view('dashboards.admins.catagory.Edit_catagory', compact('catagory'));


}

    
public function editCatagory(Request $request){
    $name = $request->name;
    $description = $request->description;
    

    $catagory = catagory::find($request->cat_id);
    $catagory->name = $name;
    $catagory->description = $description;

    $catagory->save();
    
    // $catagories = catagory::all();
    // return view('admin.catagory.show_catagory', compact('catagories'));
    return redirect()->route('show_catagory')->with('status' , 'catagory Edited Successfully!!');

}




}