<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class studentController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
    
        $students = User::when($query, function ($q) use ($query) {
                        return $q->where('name', 'like', '%' . $query . '%')
                                ->orWhere('email', 'like', '%' . $query . '%');
                    })
                    ->paginate(5);
    
        return view('dashboards.admins.student.show_student', compact('students'));
    }
    public function add(){  
        return view('dashboards.admins.student.add_student');
    }

    public function addStudent(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
    
        $student = new User();
        
        $student->name = $name;
        $student->email = $email;
        $student->password = $password;
    
        $student->save();
        
    return redirect()->route('show_student')->with('status' , 'student Added Successfully!!');
       
    }
    public function studentDelete($id){
        $student = User::find($id);
        $student->delete();
         return redirect()->route('show_student');
}

public function studentEdit($id){
   
    $student = User::find($id);
    return view('dashboards.admins.student.Edit_student', compact('student'));


}

    
public function EditStudent(Request $request){
    $name = $request->name;
    $email = $request->email;
    $password = $request->password;
    
    // dd($name);

    $student = User::find($request->student_id);
   
    $student->name = $name;
    $student->email = $email;
    $student->password = $password;
    $student->save();
      
    return redirect()->route('show_student')->with('status' , 'student Edited Successfully!!');
    
}

}