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

<main class="bg-gray-100 bg-opacity-25">

  <div class="lg:w-8/12 lg:mx-auto mb-8">

    <header class="flex flex-wrap items-center p-4 md:py-8">

      <div class="md:w-3/12 md:ml-16">
        <!-- profile image -->
        <img class="w-36 h-36 object-cover rounded-full
                     border-2 border-pink-600 p-1" src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80" alt="profile">
      </div>

      <!-- profile meta -->
      <div class="w-8/12 md:w-7/12 ml-4">
        <div class="md:flex md:flex-wrap md:items-center mb-4">
          <h2 class="text-3xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
            {{Auth()->user()->username}}
          </h2>

          <a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded  text-center 
                        sm:inline-block block">Follow</a>
        </div>

        <!-- post, following, followers list for medium screens -->
        <ul class="hidden md:flex space-x-8 mb-4">
          <li>
            <span class="font-semibold">136</span>
            posts
          </li>

          <li>
            <span class="font-semibold">40.5k</span>
            followers
          </li>
          <li>
            <span class="font-semibold">302</span>
            following
          </li>
        </ul>

        <!-- user meta form medium screens -->
        <div class="hidden md:block">
          <h1 class="font-semibold">Mr Travlerrr...</h1>
          <span>Travel, Nature and Music</span>
          <p>Lorem ipsum dolor sit amet consectetur</p>
        </div>

      </div>

      <!-- user meta form small screens -->
      <div class="md:hidden text-sm my-2">
        <h1 class="font-semibold">Mr Travlerrr...</h1>
        <span>Travel, Nature and Music</span>
        <p>Lorem ipsum dolor sit amet consectetur</p>
      </div>

    </header>

      <!-- Dropdown menu -->
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="/newpost" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New Post</a>
            </li>
          </ul>
      </div>
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
        <li class="md:border-t md:border-gray-700 md:-mt-px md:text-gray-700">
          <a class="inline-block p-3" href="#">
            <i class="fas fa-th-large text-xl md:text-xs"></i>
            <span class="hidden md:inline">post</span>
          </a>
        </li>
        <li>
          <a class="inline-block p-3" href="#">
            <i class="far fa-square text-xl md:text-xs"></i>
            <span class="hidden md:inline">igtv</span>
          </a>
        </li>
        <li>
          <a class="inline-block p-3" href="#">
            <i class="fas fa-user border border-gray-500
                             px-1 pt-1 rounded text-xl md:text-xs"></i>
            <span class="hidden md:inline">tagged</span>
          </a>
        </li>
        <li>
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="border-solid border-2 border-gray-400 mx-auto focus:ring-4 focus:outline-none focus:ring-blue-300 font-sm rounded-lg text-sm px-3.5 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"><i class="fa-solid fa-plus"></i>
          </button>
        </li>
      </ul>
      <!-- flexbox grid -->
      <div class="flex flex-wrap -mx-px md:-mx-3">

        <!-- column -->
        <div class="w-1/3 p-px md:px-3">
          <!-- post 1-->
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="image">

              <i class="fas fa-square absolute right-0 top-0 m-1"></i>
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    412K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    2,909
                  </span>
                </div>
              </div>

            </article>
          </a>
        </div>
        <div class="w-1/3 p-px md:px-3">
          <!-- post 1-->
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="image">

              <i class="fas fa-square absolute right-0 top-0 m-1"></i>
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    412K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    2,909
                  </span>
                </div>
              </div>

            </article>
          </a>
        </div>
        <div class="w-1/3 p-px md:px-3">
          <!-- post 1-->
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1502791451862-7bd8c1df43a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="image">

              <i class="fas fa-square absolute right-0 top-0 m-1"></i>
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    412K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    2,909
                  </span>
                </div>
              </div>

            </article>
          </a>
        </div>

        <div class="w-1/3 p-px md:px-3">
          <a href="#">
            <!-- post 2 -->
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1498409570040-05bf6d3dd5b5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="image">

              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    412K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    1,993
                  </span>
                </div>
              </div>

            </article>
          </a>
        </div>

        <div class="w-1/3 p-px md:px-3">
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full  md:mb-6">
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="image">
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    112K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    2,090
                  </span>
                </div>
              </div>
            </article>
          </a>
        </div>

        <div class="w-1/3 p-px md:px-3">
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1533105079780-92b9be482077?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="image">

              <i class="fas fa-video absolute right-0 top-0 m-1"></i>

              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    841K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    909
                  </span>
                </div>
              </div>

            </article>
          </a>
        </div>

        <div class="w-1/3 p-px md:px-3">
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://images.unsplash.com/photo-1475688621402-4257c812d6db?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=967&q=80" alt="image">
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    120K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    3,909
                  </span>
                </div>
              </div>

            </article>
          </a>
        </div>

      </div>
    </div>
  </div>
</main>
  @endsection