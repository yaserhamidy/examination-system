<?php
                                          
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\catagory;
use App\Models\question;


class subController extends Controller
{
    public function show(Request $request)
{
    $query = $request->input('query');

    $subject = subject::leftjoin('categories', 'categories.cat_id', 'sub_classesses.cat_id')
        ->when($query, function ($q) use ($query) {
            return $q->where('sub_classesses.sub_name', 'like', '%' . $query . '%');
        })
        ->select('sub_classesses.*', 'categories.name as name')
        ->paginate(5);

    return view('dashboards.admins.subClass.show_sub', compact('subject'));
}
    public function add(){  
        $catagory = catagory::all();
        return view('dashboards.admins.subClass.add_sub' ,compact('catagory'));
    }
    public function addSubject(Request $request){
        $name = $request->sub_name;
        $status = $request->status;
        $timer = $request->timer;
        $question_count = $request->question_count;
        $total_score = $request->total_score;
        $cat_id = $request->cat_id;
        
    
        $subject = new subject();      
        $subject->sub_name = $name;    
        $subject->status = $request->has('status') ? $request->status : 'inactive'; 
        $subject->timer = $timer;
        $subject->question_count = $question_count;
        $subject->total_score = $total_score;
        $subject->cat_id = $cat_id;
        $subject->save();
    return redirect()->route('show_sub')->with('status' , 'Exam Added Successfully!!');;
        
    }

    public function subjectDelete($sub_classesses_id){
        $subject = subject::find($sub_classesses_id);
        $subject->delete();
        return redirect()->back();
      } 
    public function subjectEdit($sub_classesses_id){
         $catagory = catagory::all();
         $subject = subject::find($sub_classesses_id);
         return view('dashboards.admins.subClass.Edit_sub', compact('subject','catagory'));
          

}

public function activateSubject($sub_classesses_id)
{
    $subject = subject::find($sub_classesses_id);
    $subject->status = 'active';
    $subject->save();
    return redirect()->back();
}

public function deactivateSubject($sub_classesses_id)
{
    $subject = subject::find($sub_classesses_id);
    $subject->status = 'inactive';
    $subject->save();
    return redirect()->back();
}

public function EditSubject(Request $request)
{
    $name = $request->sub_name;
    $status = $request->status;
    $timer = $request->timer;
    $question_count = $request->question_count;
    $total_score = $request->total_score;
    $cat_id = $request->cat_id;

    $subject = subject::find($request->sub_classesses_id);
    $subject->sub_name = $name;
    $subject->status = $status;
    $subject->timer = $timer;
    $subject->question_count = $question_count;
    $subject->total_score = $total_score;
    $subject->cat_id = $cat_id;
    $subject->save();

    return redirect()->route('show_sub')->with('status' , 'Exam Edited Successfully!!');
}

public function show_questions($sub_classesses_id)
{
    $subject = subject::findOrFail($sub_classesses_id);
    $questions = question::where('sub_classesses_id', $sub_classesses_id)->paginate(10);

    return view('dashboards.admins.subClass.show_question', compact('subject', 'questions'));
}

 
}
