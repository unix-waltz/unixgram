@extends('Client.main')
@section('content')
    <br><br>
    <figure class="max-w-md mx-auto">
        <img class="h-auto w-full rounded-lg" src="{{ asset('storage/' . $data->image) }}" alt="image description">
        <figcaption class="mt-2 text-sm text-center text-gray-500 ">Image caption</figcaption>
    </figure>
    <section class="bg-white ">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Update Post</h2>
            <form action="/edit" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                        <input type="text" name="location" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            value="{{ $data->location }}" required="">
                    </div>

                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Albums</label>
                        <select id="category" name="albumid"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                            <option selected="" value="{{ null }}">none</option>
                            @foreach ($albums as $a)
                                <option value="{{ $a->id }}">{{ $a->album_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" name="description" value="{{ $data->description }}" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 "
                            placeholder="Write a product description here...">{{ $data->description }}</textarea>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                        class="text-white bg-blue-500 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        Update product
                    </button>

                </div>
            </form>
        </div>
    </section>
@endsection
