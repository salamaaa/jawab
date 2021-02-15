@extends('layouts.app')

@section('content')

    <section class="text-gray-700 body-font">
        <div class="container px-8 pt-10 pb-24 mx-auto lg:px-4">
            <h3 class="text-center">Edit Your Answer!</h3>
            <form
                action="{{route('question.answer.update',[$question->id,$answer->id])}}"
                method="POST"
                class="flex flex-col w-full p-8 mx-auto mt-10 border-2 rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                @csrf
                @method('PUT')
                <div class="relative">
                    <textarea rows="10" id="body" name="body"
                              class="w-full mb-4 mr-4 text-gray-800 bg-gray-100 border rounded-lg focus:border-gray-500 bg-white focus:ring-0"
                              required>{{$answer->body}}</textarea>
                </div>
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="px-3 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded shadow-xl  bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:ring focus:outline-none">
                        Edit!
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
