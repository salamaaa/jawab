<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::latest()->paginate(6);
        return view('questions.index',compact('questions'));
    }

    public function create(){
        return view('questions.create');
    }

    public function store(Request $request){

    }

    public function show($id){
        $question = Question::find($id);
        return view('questions.show',compact('question'));
    }

    public function edit($id){
        $question = Question::find($id);
        return view('questions.edit',compact('question'));
    }

    public function update(Request $request,$id){

    }

    public function destroy($id){

    }








}
