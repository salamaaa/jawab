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
                                        {{$question->title}}
                                    </h3>
                                    {{\Illuminate\Support\Str::limit($question->body,250)}}
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
