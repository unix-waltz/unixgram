@extends('Client.main')
@section('content')
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
<div class="w-full">
    
<br><br>
<div class="w-full bg-white shadow ">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg  block w-full p-2.5 ">
            <option>Posts</option>
            <option>Accounts</option>
            <option>Albums</option>
        </select>
    </div>
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex  rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 text-black hover:bg-gray-100 focus:outline-none ">Posts</button>
        </li>
        <li class="w-full">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none ">Accounts</button>
        </li>
        <li class="w-full">
            <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none ">Albums</button>
        </li>
    </ul>
    <div id="fullWidthTabContent" class="border-t border-gray-200 ">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 " id="stats" role="tabpanel" aria-labelledby="stats-tab">
        

            <div class="w-[90%] mx-auto grid grid-cols-4 gap-2">
                @foreach ($posts as $d )
                <a href="/post/detail/{{$d->uuid}}" class="rounded-lg overflow-hidden">
                <img class=" w-full h-full transition-all duration-300 rounded-lg lg:rounded-none cursor-pointer filter grayscale hover:grayscale-0" src="{{asset('storage/'.$d->image)}}" alt="image description"></a>
              @endforeach
            </div>
    
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8" id="about" role="tabpanel" aria-labelledby="about-tab">
          

<div class="w-full max-w-3xl p-4 bg-white sm:p-8  ">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-900">Relate Accounts</h5>

   </div>
   <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 ">
            @foreach ($users as $u )
            <li class="py-3 sm:py-4">
                <a href="/other/{{$u->username}}" class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="w-8 h-8 rounded-full" src="{{asset('storage/'.$u->profilephoto)}}" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate ">
                         {{'@'.$u->username}}
                        </p>
                        <p class="text-sm text-gray-500 truncate ">
                            {{$u->fullname}}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base text-gray-900">
                       Account
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
   </div>
</div>
 
    </div>
    <div class="hidden p-4 bg-white " id="faq" role="tabpanel" aria-labelledby="faq-tab">
        <div class="w-[70%] mx-auto flex flex-wrap -mx-px md:-mx-5">

            @foreach ($albums as $p )
    
            <div class="w-1/3 p-px md:px-5">
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
                    {{$p->album_name}} by {{'@'.$p->albumUser->username}}
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
        </div>
    </div>
</div>

</div>


@endsection