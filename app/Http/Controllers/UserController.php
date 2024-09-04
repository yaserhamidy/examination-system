<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\subject;

class UserController extends Controller
{
    function index(){ 
        // dd("Hello");
        $subjects = subject::paginate(5);
        return view('dashboards.users.index', compact('subjects'));
    }
    function profile(){
        return view('dashboards.users.profile');
    }
    function settings(){
        return view('dashboards.users.settings');
    }
   
}
