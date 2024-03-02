<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unixgram</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ddcd3be20c.js" crossorigin="anonymous"></script>
</head>
<body>
    

<nav class="fixed w-full pb-1 border-b px-4 py-2 bg-white z-50">
    <div class="flex flex-wrap items-center justify-between md:justify-around">
 <a href="/">
        <img class="h-10" src="{{asset('asset/Unixgram-2-20-2024.png')}}" alt="instagram">
      </a>

      <!-- search-->
      <div class="relative hidden sm:block text-gray-700">
        <input class="search-bar max-w-xs h-1/2  rounded bg-gray-200 px-4
              text-center outline-none " type="search" placeholder="Search">
        
      </div>
  
      <div class="space-x-4">
        @guest
        <a class="inline-block bg-blue-500 px-2 py-1 text-white font-semibold 
        text-sm rounded" href="/login">Log In</a>
        <a class="inline-block text-blue-500 font-semibold text-sm" href="/register">Sign Up</a>
        @else
        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
            <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center pl-1 pr-11 py-0 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
             {{Auth()->user()->fullname}}&nbsp;&nbsp;&nbsp;
             <img class="w-7 h-7 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{asset( 'storage/'. Auth()->user()->profilephoto)}}" alt="Bordered avatar">
                &nbsp;&nbsp;
            </button>
            <!-- Dropdown -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700" id="language-dropdown-menu">
              <ul class="py-2 font-medium" role="none">
               
                <li>
                  <a href="/myprofile/{{'@'.Auth()->user()->username}}" class="block px-10 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <div class="inline-flex items-center">
 Profile
                    </div>
                  </a>
                </li>
                <li>
                  <a href="/profile/setting" class="block px-10 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <div class="inline-flex items-center">
Setting
                    </div>
                  </a>
                </li>
                <li>
                  <a href="/logout" class="block px-10 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <div class="inline-flex items-center">
Logout
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-language" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
             
          </button>
        </div>
    
        @endguest
      </div>
    </div>
  </nav>
  <br><br>



   


  
  @yield('content')


<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{asset('asset/Unixgram-2-20-2024.png')}}" class="h-12" alt="Flowbite Logo" />
                <span class="self-center font-medium text-xl text-gray-500 whitespace-nowrap dark:text-white">By Unix-waltz</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://unix-waltz.github.io/" class="hover:underline">Unix-waltz</a>. All Rights Reserved.</span>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>