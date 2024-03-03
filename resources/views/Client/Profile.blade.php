@extends('Client.main')
@section('content')
<!-- nav -->
<style>
  .pb-full {
  padding-bottom: 100%;
}

/* hide search icon on search focus */
.search-bar:focus + .fa-search{
  display: none;
}

@media screen and (min-width: 768px) {
  .post:hover .overlay {
    display: block;
  }
}

</style>
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <form action="/album/new" method="POST" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
@method('POST')
@csrf
<input type="hidden" name='userid' value="{{Auth()->user()->id}}">
      <div class="flex items-center justify-between p-4 md:p-5 rounded-t ">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          New Album
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5 space-y-4">
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album Name</label>
          <input type="text" id="email" name="album_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="my Album" required />
        </div>
      </div>
      <!-- Modal footer -->
      <div class="flex items-center p-4 md:p-5 rounded-b ">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
        <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
      </div>
    </form>
  </div>
</div>

<main class="bg-gray-100 bg-opacity-25">

  <div class="lg:w-8/12 lg:mx-auto mb-8">

    <header class="flex flex-wrap items-center p-4 md:py-8">

      <div class="md:w-3/12 md:ml-16">
        <!-- profile image -->
        <img class="w-36 h-36 object-cover rounded-full
                     border-2 border-pink-600 p-1"  
                     @if (isset($profile->profilephoto))
                     src="{{ asset('storage/' . $profile->profilephoto) }}"
                     @else
                     src="{{ asset('asset/no-image.jpg') }}"
                   @endif
                    alt="profile">
      </div>

      <!-- profile meta -->
      <div class="w-8/12 md:w-7/12 ml-4">
        <div class="md:flex md:flex-wrap md:items-center mb-4">
          <h2 class="text-3xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
            {{$profile->username}}
          </h2>
{{-- @if ($profile->id == Auth()->user()->id)
     <a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded-full  text-center 
                        sm:inline-block block">
                        <i class="fa-solid fa-check"></i>
                      </a>
@endif --}}
       
        </div>

        <!-- post, following, followers list for medium screens -->
        <ul class="hidden md:flex space-x-8 mb-1">
          <li>
            <span class="font-semibold">{{$post}}</span>
            posts
          </li>

          <li>
            <span class="font-semibold">{{$albums}}</span>
            Albums
          </li>
          <li>
            <span class="font-semibold">{{$likes}}</span>
            Likes
          </li>
        </ul>

        <!-- user meta form medium screens -->
        <div class="hidden md:block">
          <h1 class="font-semibold">{{$profile->email}}</h1>
          <br>
          <p>{{$profile->bio}}</p>
        </div>

      </div>

      <!-- user meta form small screens -->
      <div class="md:hidden text-sm my-2">
        <h1 class="font-semibold">{{$profile->email}}</h1>
        <p>{{$profile->bio}}</p>
      </div>

    </header>

      <!-- Dropdown menu -->
@if ($profile->id == Auth()->user()->id)
  
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            
    <li>
      <a href="/post/new" class="text-center block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New Post</a>
    </li>
    <li>
      
      <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button">New Albums</button>
      
    </li>
  </ul>
</div>
@endif
    <!-- posts -->
    <div class="px-px md:px-3">

      <!-- user following for mobile only -->
      <ul class="flex md:hidden justify-around space-x-8 border-t 
                text-center p-2 text-gray-600 leading-snug text-sm">
        <li>
          <span class="font-semibold text-gray-800 block">136</span>
          posts
        </li>

        <li>
          <span class="font-semibold text-gray-800 block">40.5k</span>
          followers
        </li>
        <li>
          <span class="font-semibold text-gray-800 block">302</span>
          following
        </li>
      </ul>

      <!-- insta freatures -->
      <ul class="flex items-center justify-around md:justify-center space-x-12  
                    uppercase tracking-widest font-semibold text-xs text-gray-600
                    border-t">
        <!-- posts tab is active -->
        <li class="{{$input == 'true' ? '' : 'md:border-t md:border-gray-700 md:-mt-px md:text-gray-700'}}">
          <a class="inline-block p-3" href="?page=posts">
            <i class="fas fa-th-large text-xl md:text-xs"></i>
            <span class="hidden md:inline align-middle">post</span>
          </a>
        </li>
        <li class="{{$input == 'true' ? 'md:border-t md:border-gray-700 md:-mt-px md:text-gray-700' : ''}}">
          <a class="inline-block p-3" href="?page=albums">
            <i class="fa-regular fa-images text-xl md:text-xs"></i>
            
            <span class="hidden md:inline align-middle">Albums</span>
          </a>
        </li>
@if ($profile->id == Auth()->user()->id)

        <li>
          <a class="inline-block p-3" href="#">
            <i class="fa-solid fa-plus px-1 pt-1 rounded text-xl md:text-xs"></i>
            <button class="hidden md:inline align-middle" id="dropdownDefaultButton" type="button" data-dropdown-toggle="dropdown">NEW POST</button>
          </a>
        </li>
@endif
      </ul>
      <!-- flexbox grid -->
      <div class="flex flex-wrap -mx-px md:-mx-3">

        <!-- column -->
     
        @if ($input == 'true')
        @foreach ($data as $p )

        <div class="w-1/3 p-px md:px-3">
          <!-- post 1-->
          <a href="/album/details/{{$p->id}}">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" 
              @if (isset($p->albumPosts->first()->image))
                src="{{ asset('storage/' . $p->albumPosts->first()->image) }}"
                @else
                src="{{ asset('asset/no-image.jpg') }}"
              @endif
              
               alt="image">
              
              <i class="fas fa-square absolute right-0 top-0 m-1"></i>
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
              left-0 top-0 hidden">
              <div class="flex justify-center items-center 
              space-x-4 h-full">
              <span class="p-2">
                <i class="fa-regular fa-folder-open"></i>
                {{$p->album_name}}
              </span>
              <span class="p-2">
                <i class="fa-regular fa-images"></i>
                {{$p->albumPosts->count()}}
              </span>
            </div>
          </div>
          
        </article>
      </a>
     
    </div>
    @endforeach
        @else
        @foreach ($data as $p )
        <div class="w-1/3 p-px md:px-3">
          <!-- post 1-->
          <a href="/post/detail/{{$p->uuid}}">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="{{ asset('storage/' . $p->image) }}" alt="image">
              
              <i class="fas fa-square absolute right-0 top-0 m-1"></i>
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
              left-0 top-0 hidden">
              <div class="flex justify-center items-center 
              space-x-4 h-full">
              <span class="p-2">
                <i class="fas fa-heart"></i>
                0
              </span>
              
              <span class="p-2">
                <i class="fas fa-comment"></i>
                0
              </span>
            </div>
          </div>
          
        </article>
      </a>
    </div>
    @endforeach
    @endif
    
  </div>
</div>
</div>
</main>
@endsection