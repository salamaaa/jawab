<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::latest()->paginate(6);
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required']
        ]);
        Question::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect()->route('questions.index');
    }

    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show', compact('question'));
    }

    public function edit($id)
    {

        $question = Question::find($id);
        $this->authorize('update',$question);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required']
        ]);

       $question = Question::find($id);
       $this->authorize('update',$question);
       $question->title = $request->title;
       $question->body = $request->body;
       $question->save();

        return back();

    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $this->authorize('delete',$question);
        $question->delete();
        return redirect('questions');
    }


}
