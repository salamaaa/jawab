@extends('layouts.app')

@section('content')
    <div class="container mb-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="media">
                            <div class="d-flex flex-column mr-32 text-sm text-center ">
                                <a title="This question is useful" class="vote-up">
                                    <i class="fas fa-caret-up fa-3x cursor-pointer text-gray-700"></i>
                                </a>
                                <span class="votes-count text-xl font-bold">{{$question->votes}}</span>
                                <a title="This question is useless" class="vote-down off">
                                    <i class="fas fa-caret-down fa-3x cursor-pointer text-gray-700"></i>
                                </a>
                                <a title="Mark as Favourite (Click again to undo) " class="favourite">
                                    <i class="fas fa-star fa-2x cursor-pointer text-yellow-300"></i>
                                </a>
                                <span class="favourite-count font-bold">12</span>
                            </div>
                            <div class="media-body">
                                <div class="flex justify-between items-center">
                                    <h3 class="mt-0">
                                        <a href="{{$question->url}}">{{$question->title}}</a>
                                    </h3>
                                    @if($question->user->is(auth()->user()))
                                        <div><a href="{{route('questions.edit',$question->id)}}"
                                                class="px-2 py-1 bg-blue-400 text-white border rounded hover:no-underline hover:bg-blue-500">
                                                Edit
                                            </a>
                                            <form action="{{route('questions.destroy',$question->id)}}"
                                                  method="POST"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-2 py-1 bg-red-500 text-white border rounded hover:no-underline hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <p class="leading-7">{{\Illuminate\Support\Str::limit($question->body,250)}}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex justify-center">
                                        <a href="{{$question->user->url}}" class="pr-2">
                                            <img src="{{$question->user->avatar}}"
                                                 alt="{{$question->user->name}}'s image">
                                        </a>
                                        <a href="{{$question->user->url}}"
                                           class="hover:no-underline hover:text-blue-600 font-bold text-lg">{{$question->user->name}}
                                        </a>
                                    </div>
                                    <small class="text-gray-600">{{$question->created_at->diffForHumans()}}</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div
                        class="card-header">{{$question->answers->count() ." ". \Illuminate\Support\Str::plural('answer',$question->answers->count())}} </div>
                    <div class="card-body">
                       @if(!$question->answers->count())
                            <div class="panel panel-default">
                                <div class="panel-body text-center">No Answers yet!</div>
                            </div>
                        @else
                            @foreach($question->answers as $answer)
                                <div class=" flex justify-between items-center">
                                    <div class="d-flex flex-column mr-32 text-sm text-center ">
                                        <a title="This question is useful" class="vote-up">
                                            <i class="fas fa-caret-up fa-3x cursor-pointer text-gray-700"></i>
                                        </a>
                                        <span class="votes-count text-xl font-bold">{{$answer->votes_count}}</span>
                                        <a title="This question is useless" class="vote-down off">
                                            <i class="fas fa-caret-down fa-3x cursor-pointer text-gray-700"></i>
                                        </a>
                                        <a title="Mark this answer as best answer (Click again to undo) " class="best_answer">
                                            <i class="fas fa-check fa-2x cursor-pointer text-green-600"></i>
                                        </a>
                                        <span class="best_answer_count font-bold">5</span>
                                    </div>

                                    <div>
                                        <div class="card-text text-gray-900">{{$answer->body}}</div>
                                        <div class="flex justify-between">
                                            <div class="media mt-2">
                                                <a href="{{$answer->user->url}}" class="pr-2">
                                                    <img src="{{$answer->user->avatar}}"
                                                         alt="{{$answer->user->name}}'s image">
                                                </a>
                                                <div class="media-body mt-1">
                                                    <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                                </div>
                                            </div>
                                            <div>
                                            <span
                                                class="text-gray-500 text-xs">
                                                {{$answer->created_at->diffForHumans()}}
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <form action="" method="POST">
                    <textarea class="w-full py-2 text-gray-700 border rounded-lg focus:outline-none" rows="5"
                              placeholder="Answer here.."></textarea>
                </form>
            </div>
        </div>
    </div>
@endsection

