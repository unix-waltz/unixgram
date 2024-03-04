@extends('Client.main')
@section('content')
<section class="bg-white ">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
              <span class="font-medium">Failed to Upload:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $e )
                    <li>{{$e}}</li>
                    @endforeach
              </ul>
            </div>
          </div>
        @endif
        <h2 class="mb-4 text-xl font-bold text-gray-900 ">Add a new Post</h2>
        <form action="/profile/setting" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
{{-- <input type="hidden" name="uuid" value="{{bin2hex(Auth()->user()->username . mt_rand(1,10) . time())}}"> --}}

            <input type="hidden" name='oldimg' value="{{Auth()->user()->profilephoto}}">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                    <input type="text" value="{{$data->fullname}}" name="fullname" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "  required="">
                </div>
                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <input type="text" name="username" value="{{$data->username}}" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "  required="">
                </div>
                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                    <input type="email" name="email" value="{{$data->email}}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required="">
                </div>
                <div class="w-full">
<label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Profile Photo</label>
<input name="profilephoto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " aria-describedby="file_input_help" id="file_input" type="file">
<p class="mt-1 text-sm text-gray-500 " id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
    
                </div>


                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Bio</label>
                    <textarea id="description" name="bio" value="{{$data->bio}}" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Your description here">{{$data->bio}}</textarea>
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-blue-500  hover:bg-blue-500">
                Posting
            </button>
        </form>
    </div>
  </section>
@endsection