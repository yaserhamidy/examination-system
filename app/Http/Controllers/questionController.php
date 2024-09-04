<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;
use App\Models\subject;

class questionController extends Controller
{
   
    public function show(Request $request)
{   
    $query = $request->input('query');

    $questions = question::leftJoin('sub_classesses', 'sub_classesses.sub_classesses_id', 'questions.sub_classesses_id')
        ->select('questions.*', 'sub_classesses.sub_name as name');

    if ($query) {
        $questions->where('questions.question', 'like', '%' . $query . '%');
    }

    $questions = $questions->paginate(5);

    return view('dashboards.admins.question.show_question', compact('questions'));
}
    public function add(){  
        $subject = subject::all();
        return view('dashboards.admins.question.add_question' ,compact('subject'));
    }

    public function addQuestion(Request $request){

        
        $question = $request->question;
        $answerone = $request->answerone;
        $answertow = $request->answertow;
        $answerthree = $request->answerthree;
        $answerfour = $request->answerfour;
        $finalanswer = $request->finalanswer;
        $sub_classesses_id = $request->sub_classesses_id;
        // dd($question);
        $questions = new question();      
        $questions->question = $question;    
        $questions->answerone = $answerone;
        $questions->answertow = $answertow;
        $questions->answerthree = $answerthree;
        $questions->answerfour = $answerfour;
        $questions->finalanswer = $finalanswer;
        $questions->sub_classesses_id = $sub_classesses_id;
        
        $questions->save();
        // dd('hello');
        return redirect()->route('show_question')->with('status' , 'Question Added Successfully!!');
    }

    public function questionDelete($question_id){
        $question = question::find($question_id);
        $question->delete();
        return redirect()->route('show_question');
      } 

      public function questionEdit($question_id){
        $subject = subject::all();
        $questions = question::find($question_id);
        return view('dashboards.admins.question.Edit_question', compact('questions','subject'));
         

}

public function EditQuestion(Request $request){
    
    $question = $request->question;
        $answerone = $request->answerone;
        $answertow = $request->answertow;
        $answerthree = $request->answerthree;
        $answerfour = $request->answerfour;
        $finalanswer = $request->finalanswer;
        $sub_classesses_id = $request->sub_classesses_id;
    

    $questions = question::find($request->question_id);
    $questions->question = $question;    
    $questions->answerone = $answerone;
    $questions->answertow = $answertow;
    $questions->answerthree = $answerthree;
    $questions->answerfour = $answerfour;
    $questions->finalanswer = $finalanswer;
    $questions->sub_classesses_id = $sub_classesses_id;
    

    $questions->save(); 
    
    return redirect()->route('show_question')->with('status' , 'Question Edited Successfully!!');    

  }


}
