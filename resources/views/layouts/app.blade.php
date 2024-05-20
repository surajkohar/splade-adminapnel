
@include('layouts.navigation')

<div class="sidebar flex h-full md:grid grid-cols-5 ">

        <!-- sidebar -->
     <div class='border-r-2 border-gray-200'>
        <aside id="sidebar" class="h-screen hidden md:block fixed  md:static bg-white rounded-lg z-40 col-span-1 space-y-6 ml-[1%] md:ml-[10%]">
            <div class="logo-heading p-4 pb-0 ">
                <h1 class="text-[#435EBE] text-3xl font-semibold">Ease Lab</h1>
            </div>
            <div class="menu-links p-4 space-y-4 ">
                <div class="menu-1 space-y-2">
                    <div class="heading">
                        <h1 class=" font-semibold text-base">Dashboard</h1>
                    </div>
                    <div class="sub-headlinks">

                        <Link href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'text-white  bg-orange' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold" >   
                      <i class="fa-solid fa-house mr-2"></i> Dashboard</Link>

                    </div>
                </div>
                <div class="menu-2 space-y-2 ">
                    <div class="heading">
                        <h1 class=" font-semibold text-base">Others</h1>
                    </div>

                    <div class="sub-headlinks">                                      
                        <Link href="{{ route('products.index') }}"
                        class="{{ request()->routeIs('products.index') ? 'text-white  bg-orange' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold" >    
                        <i class="fa-solid fa-bag-shopping mr-2"></i> Product</Link>
                    </div>
                    @canany('user_access')
                    <div class="sub-headlinks">
                        <Link href="{{ route('users.index') }}"
                        class="{{ request()->routeIs('users.index') ? 'text-white  bg-orange' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold" >    
                        <i class="fa-solid fa-user mr-2"></i> User</Link>
                    </div>
                    @endcanany

                    @canany(['Role_access','Role_create','Role_edit','Role_delete'])
                    <div class="sub-headlinks">
                        <Link href="{{route('roles.index')}}"
                        class="{{ request()->routeIs('roles.index') ? 'text-white  bg-orange' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">                        
                        <i class="fa-solid fa-key mr-2"></i> Role</Link>
                    </div>
                    @endcanany

                    @canany('Permission_access')
                    <div class="sub-headlinks">
                        <Link href="{{route('permissions.index')}}"
                        class="{{ request()->routeIs('permissions.index') ? 'text-white  bg-orange' : 'text-[#253949] hover:bg-[#F0F1F5]' }} block rounded-lg  p-4 w-full   font-sans  text-base font-semibold">           
                          <i class="fa-solid fa-notes-medical mr-2"></i> Permission</Link>
                    </div>
                    @endcanany

                    <!-- <div class="sub-headlinks">
                        <a href=""
                            class=" block rounded-lg  p-4 w-full text-[#253949] hover:bg-[#F0F1F5] font-sans  text-base font-semibold">
                            <i class="fa-solid fa-envelopes-bulk mr-2"></i> Enquiry</a>
                    </div> -->

                    <!-- <div class="sub-headlinks">
                        <a href=""
                            class=" block rounded-lg  p-4 w-full text-[#253949] hover:bg-[#F0F1F5] font-sans  text-base font-semibold">
                            <i class="fa-solid fa-message mr-2"></i> Quotes</a>
                    </div> -->

                    <!-- <div class="sub-headlinks">
                        <a href=""
                            class=" block rounded-lg  p-4 w-full text-[#253949] hover:bg-[#F0F1F5] font-sans  text-base font-semibold">
                            <i class="fa-solid fa-store mr-2"></i> Storage</a>
                    </div> -->

                </div>

            </div>
        </aside>
        </div>

          
        

        <!-- nav -->
        <div class=" right-area container overflow-x-auto mx-auto p-4 col-span-4 bg-[#F2F7FF]">
        <i class="fa-solid fa-bars text-3xl block md:hidden" id="toggleSideBar"></i>
           
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>




<x-splade-script>
 const toggleButton = document.getElementById('toggleSideBar');
        const sidebar = document.getElementById('sidebar');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
        });

        // Close sidebar when clicking outside of it (optional)
        window.addEventListener('click', function (event) {
            if (!event.target.matches('#toggleSideBar') && !event.target.closest('#sidebar')) {
                sidebar.classList.add('hidden');
            }
        });

  </x-splade-script>




  <!-- bg-[#435EBE] -->