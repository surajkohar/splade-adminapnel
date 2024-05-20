<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />

</head>

<body class="bg-gray-100">
     
    <!-- Header -->
    <header class="bg-indigo-500 py-4 sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Home</h1>
            <div class="login space-x-6 flex justify-end">
                @if (!auth()->check())
                  <div style="margin-right: 5%">
                    <a href="{{ route('login') }}"
                        class="p-2 bg-white text-indigo-500 hover:text-indigo-600 font-bold rounded-lg mr-2">Login</a>
                    <a href="{{ route('register') }}"
                        class="p-2 bg-white text-indigo-500 hover:text-indigo-600 font-bold rounded-lg mr-2">Register</a>
                 </div>
                @endif

                @auth
                    <div class="relative group">
                        <button 
                            class="p-2 bg-white text-indigo-500 hover:text-indigo-600 font-bold rounded-lg focus:outline-none mr-12"
                            id="userDropdownBtn">
                            {{ auth()->user()->name }}
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M19 9l-7 7-7-7"></path>
                          </svg>
                        </button>
                        <ul id="userDropdown"
                            class="absolute hidden mt-2 bg-white rounded-md shadow-lg text-indigo-500 border border-indigo-500">
                            <li><a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 text-sm hover:bg-indigo-500 hover:text-white">Dashboard</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm hover:bg-indigo-500 hover:text-white focus:outline-none">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container mx-auto flex items-center justify-center my-8">
            <h1 class="text-3xl shadow-lg font-bold">Welcome To the World of Coders</h1>
        </div>
    
        <!-- Carousel Section -->
        {{-- <div class="container mx-auto mt-8">
            <div class="owl-carousel">
                <!-- Carousel Items -->
                <div class="item"><img src="/login-img.jpg" alt="Carousel Image 1"></div>
                <div class="item"><img src="/login-image.jpg" alt="Carousel Image 2"></div>
                <div class="item"><img src="/login-image1.jpg" alt="Carousel Image 3"></div>
                <!-- Add more items as needed -->
            </div>
        </div> --}}
        

<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/login-img.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/login-image.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/login-image1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<h2 class="text-4xl p-4 m-9 font-bold hover:text-indigo-600 transition-colors duration-300">Products</h2>



<div class="grid grid-cols-2 md:grid-cols-3 m-4 mb-4 gap-4">
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
    </div>
    <div>
        <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
    </div>
   
</div>


    </main>

    
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex flex-col items-center">
          <div class="flex flex-col space-y-2">
            <a href="#" class="text-sm">Home</a>
            <a href="#" class="text-sm">About</a>
            <a href="#" class="text-sm">Contact Us</a>
          </div>
        </div>
      
          <div class="flex space-x-4 mt-4  lg:mt-0 lg:ml-auto">
            <a href="#" class="text-sm">Privacy Policy</a>
            <a href="#" class="text-sm">Terms of Service</a>
          </div>
          
        </footer>
        <div style="color: rgb(243, 37, 37)51)" class="bg-gray-400 mt-2 text-center h-8">
            <p class="text-sm mt-4 lg:mt-0 lg:ml-auto">© 2023 Your Company. All rights reserved.</p>

           </div>


    <script>
        
        // JavaScript to toggle dropdown menu
        document.addEventListener('DOMContentLoaded', function () {
            const userDropdownBtn = document.getElementById('userDropdownBtn');
            const userDropdown = document.getElementById('userDropdown');
            
            
       console.log('userDropdownBtn:', userDropdownBtn);
      console.log('userDropdown:', userDropdown);

     if (userDropdownBtn) {
        userDropdownBtn.addEventListener('click', function () {
            userDropdown.classList.toggle('hidden');
        });
      }

            // userDropdownBtn.addEventListener('click', function () {
            //     userDropdown.classList.toggle('hidden');
            // });

            // Close dropdown when clicking outside of it
            document.addEventListener('click', function (event) {
                if (!userDropdownBtn.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }
            });
        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
