<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        Answer::create([
            'user_id'=>Auth::id(),
            'question_id'=>$id,
            'body'=>$request->body
        ]);

        return redirect()->route('questions.show',$id);
    }



    public function edit($q_id,$a_id)
    {
        $question = Question::find($q_id);
        $answer = Answer::find($a_id);

        return view('answers.edit',['question'=>$question,'answer'=>$answer]);
    }

    public function update(Request $request, $q_id,$a_id)
    {


        $answer = Answer::find($a_id);
        $this->authorize('update',$answer);
        $answer->body = $request->body;
        $answer->save();

        return redirect()->route('question.answer.edit',[$q_id,$a_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($q_id,$a_id)
    {
        $answer =  Answer::find($a_id);
        $answer->delete();
        return redirect()->route('questions.show',$q_id);
    }
}
