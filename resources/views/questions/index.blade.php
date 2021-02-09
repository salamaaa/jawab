@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        All Questions
                    </div>
                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0">
                                        <a href="{{$question->url}}">{{$question->title}}</a>
                                    </h3>
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
