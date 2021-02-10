@extends('layouts.app')

@section('content')
    <div class="container mb-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header flex items-center justify-between">
                        <h3>All Questions</h3>
                        <a class="hover:no-underline hover:bg-blue-700 border rounded p-1 bg-blue-600 text-white"
                           href="{{route('questions.create')}}">
                            Ask a Question
                        </a>
                    </div>
                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column mr-32 text-sm text-center">
                                    <div class="w-30 h-30">
                                        <strong
                                            class="block text-2xl">{{$question->votes}}</strong>{{\Illuminate\Support\Str::plural('vote',$question->answers)}}
                                    </div>
                                    <div class="block mb-5 status {{$question->status}}">
                                        <strong
                                            class="block text-2xl">{{$question->answers}}</strong>{{\Illuminate\Support\Str::plural('answer',$question->answers)}}
                                    </div>
                                    <div class="text-gray-600">
                                        {{$question->views .' '.\Illuminate\Support\Str::plural('view',$question->views)}}
                                    </div>
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
                                        <a href="{{$question->user->url}}"
                                           class="hover:no-underline hover:text-blue-600 font-bold text-lg">{{$question->user->name}}</a>
                                        <small class="text-gray-600">{{$question->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
                {{$questions->links()}}
            </div>
        </div>
    </div>
@endsection
