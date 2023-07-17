 <nav x-data="{ open: false }" class="  fixed right-0 left-0 top-0">
     <div class="bg-black border-b-4 text-justify border-lime-500 justify-stretch">

         <!-- Primary Navigation Menu -->
         {{-- first navigation  --}}
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="flex justify-between h-16">
                 <div class="flex">
                     <!-- Logo -->
                     <div class="shrink-0 flex items-center">
                         <a href="{{ route('dashboard') }}">
                             <img src="/storage/logo.png" class="h-12">
                         </a>
                     </div>
                 </div>
                 <!-- link -->
                 <!-- Settings Dropdown -->
                 <div class="hidden sm:flex sm:items-center sm:ml-6">
                     @auth
                         <div class="overflow-hidden h-12 w-12">
                             @if (auth()->user()->avatar)
                                 <a href="{{ route('profile.edit') }}">
                                     <img class="rounded-full aspect-square object-cover h-10"
                                         {{ $avt = auth()->user()->avatar }} src="{{ "/storage/$avt" }}">
                                 </a>
                             @else
                                 <img class="rounded-full aspect-square object-cover h-10"
                                     src="{{ '/storage/default.png' }}">
                             @endif
                         </div>
                         <x-dropdown align="right" width="48">
                             <x-slot name="trigger">
                                 <button
                                     class="bg-opacity-10 hover:bg-opacity-40 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-tr-lg rounded-bl-lg text-white hover:text-black  bg-white focus:outline-none transition ease-in-out duration-150">
                                     <div>{{ Auth::user()->name }}</div>

                                     <div class="ml-1">
                                         <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                             <path fill-rule="evenodd"
                                                 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                 clip-rule="evenodd" />
                                         </svg>
                                     </div>
                                 </button>
                             </x-slot>

                             <x-slot name="content">
                                 <x-dropdown-link :href="route('profile.edit')">
                                     {{ __('Profile') }}
                                 </x-dropdown-link>

                                 <!-- Authentication -->
                                 <form method="POST" action="{{ route('logout') }}">
                                     @csrf

                                     <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
  this.closest('form').submit();">
                                         {{ __('Log Out') }}
                                     </x-dropdown-link>
                                 </form>
                             </x-slot>
                         </x-dropdown>
                         {{-- second navigation --}}
                     @endauth

                 </div>

                 <!-- Hamburger -->
                 <div class="-mr-2 flex items-center sm:hidden">
                     <button @click="open = ! open"
                         class="inline-flex items-center justify-center p-2 rounded-md text-gray-400  hover:text-gray-500  hover:bg-gray-100  focus:outline-none focus:bg-gray-100  focus:text-gray-500  transition duration-150 ease-in-out">
                         <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                             <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M4 6h16M4 12h16M4 18h16" />
                             <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M6 18L18 6M6 6l12 12" />
                         </svg>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Responsive Navigation Menu -->

     </div>
     <div class="bg-stone-900 text-justify  flex bg justify-evenly">
         <div class=" space-x-8 sm:-mp-px sm:pl-10 sm:flex">
             {{-- home --}}
             <x-nav-link :href="route('dashboard')">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                     <path fill-rule="evenodd"
                         d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                         clip-rule="evenodd" />
                 </svg>

                 {{ __('Home') }}
             </x-nav-link>
         </div>
         <!-- product -->
         <div class=" space-x-8 sm:-py-px sm:pl-10 sm:flex">
             <x-nav-link :href="route('product.index')">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                     <path
                         d="M2 4.5A2.5 2.5 0 014.5 2h11a2.5 2.5 0 010 5h-11A2.5 2.5 0 012 4.5zM2.75 9.083a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H2.75zM2.75 12.663a.75.75 0 000 1.5h14.5a.75.75 0 000-1.5H2.75zM2.75 16.25a.75.75 0 000 1.5h14.5a.75.75 0 100-1.5H2.75z" />
                 </svg>

                 {{ __('Product List') }}
             </x-nav-link>
         </div>
         <!-- catagory -->
         <div class=" space-x-8 sm:-py-px sm:pl-10 sm:flex">
             <x-nav-link :href="route('product.index')">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                     <path fill-rule="evenodd"
                         d="M2.5 3A1.5 1.5 0 001 4.5v4A1.5 1.5 0 002.5 10h6A1.5 1.5 0 0010 8.5v-4A1.5 1.5 0 008.5 3h-6zm11 2A1.5 1.5 0 0012 6.5v7a1.5 1.5 0 001.5 1.5h4a1.5 1.5 0 001.5-1.5v-7A1.5 1.5 0 0017.5 5h-4zm-10 7A1.5 1.5 0 002 13.5v2A1.5 1.5 0 003.5 17h6a1.5 1.5 0 001.5-1.5v-2A1.5 1.5 0 009.5 12h-6z"
                         clip-rule="evenodd" />
                 </svg>
                 {{ __('Catagory') }}
             </x-nav-link>
         </div>
         <!-- cart -->
         <div class=" space-x-8 sm:-py-px sm:pl-10 sm:flex">
             <x-nav-link :href="route('product.index')">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                     <path fill-rule="evenodd"
                         d="M6 5v1H4.667a1.75 1.75 0 00-1.743 1.598l-.826 9.5A1.75 1.75 0 003.84 19H16.16a1.75 1.75 0 001.743-1.902l-.826-9.5A1.75 1.75 0 0015.333 6H14V5a4 4 0 00-8 0zm4-2.5A2.5 2.5 0 007.5 5v1h5V5A2.5 2.5 0 0010 2.5zM7.5 10a2.5 2.5 0 005 0V8.75a.75.75 0 011.5 0V10a4 4 0 01-8 0V8.75a.75.75 0 011.5 0V10z"
                         clip-rule="evenodd" />
                 </svg>

                 {{ __('Cart') }}
             </x-nav-link>
         </div>
         <!-- about -->
         <div class=" space-x-8 sm:-py-px sm:pl-10 sm:flex">
             <x-nav-link :href="route('about')">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                     <path
                         d="M3.505 2.365A41.369 41.369 0 019 2c1.863 0 3.697.124 5.495.365 1.247.167 2.18 1.108 2.435 2.268a4.45 4.45 0 00-.577-.069 43.141 43.141 0 00-4.706 0C9.229 4.696 7.5 6.727 7.5 8.998v2.24c0 1.413.67 2.735 1.76 3.562l-2.98 2.98A.75.75 0 015 17.25v-3.443c-.501-.048-1-.106-1.495-.172C2.033 13.438 1 12.162 1 10.72V5.28c0-1.441 1.033-2.717 2.505-2.914z" />
                     <path
                         d="M14 6c-.762 0-1.52.02-2.271.062C10.157 6.148 9 7.472 9 8.998v2.24c0 1.519 1.147 2.839 2.71 2.935.214.013.428.024.642.034.2.009.385.09.518.224l2.35 2.35a.75.75 0 001.28-.531v-2.07c1.453-.195 2.5-1.463 2.5-2.915V8.998c0-1.526-1.157-2.85-2.729-2.936A41.645 41.645 0 0014 6z" />
                 </svg>

                 {{ __('About') }}
             </x-nav-link>
         </div>
 </nav>
