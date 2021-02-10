@extends('layouts.app')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-8 pt-10 pb-24 mx-auto lg:px-4">
            <h3 class="text-center">Edit "{{$question->title}}" Question!</h3>
            <form
                action="{{route('questions.update',$question->id)}}"
                method="POST"
                class="flex flex-col w-full p-8 mx-auto mt-10 border-2 rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                @csrf
                @method('PUT')
                <div class="relative ">
                    <input type="text" id="title" name="title" placeholder="Title"
                           class="bg-white w-full px-4 py-2 mb-4 mr-4 text-base text-gray-800 bg-gray-100 border rounded-lg focus:ring-0"
                           required
                           value="{{$question->title}}"
                    >

                    <span class="text-red-700">@error('title') {{$message}} @enderror</span>
                </div>
                <div class="relative">
                    <textarea rows="10" id="body" name="body"
                              class="w-full mb-4 mr-4 text-gray-800 bg-gray-100 border rounded-lg focus:border-gray-500 bg-white focus:ring-0"
                              required>
                                {{$question->body}}
                    </textarea>
                    <span class="text-red-700">@error('body') {{$message}} @enderror</span>
                </div>
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="w-full px-5 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl lg:w-1/2 bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:ring focus:outline-none">
                        Edit!
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
