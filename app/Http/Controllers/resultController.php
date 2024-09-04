<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\subject;
use App\Models\result;

class resultController extends Controller
{
    public function show()
    {
        // Fetch results with relationships
        $results = result::with(['student', 'exam'])->get();
        
        return view('dashboards.admins.result.show_result', compact('results'));
    }
    public function storeResult($correctAnswers, $totalQuestions, $userId, $subClass)
{
    $result = new \App\Models\result();
    $result->correct_answers = $correctAnswers;
    $result->incorrect_answers = $totalQuestions - $correctAnswers;
    $result->user_id = $userId; // Assuming you have a foreign key relationship between Result and User models
    $result->exam_id = $subClass->id; // Assuming you have a foreign key relationship between Result and Exam models
    $result->save();
 }
 public function resultDelete($result_id){
    $result = result::find($result_id);
    $result->delete();
    return redirect()->route('show_result');
  } 

}
