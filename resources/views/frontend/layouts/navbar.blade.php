<!-- <header id="header" class="header d-flex align-items-center fixed-top" style="background-color: {{ Request::is('/') ? '' : '#15222BD9' }};">
    <div class="container-fluid container position-relative d-flex align-items-center ">

        <a href="/" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('img/Converttree white logo.png') }}" style="width: 200px; height: auto; max-height: 80px;" alt="Converttree Logo">
        </a>
        <style>
            #navmenu a {
              text-decoration: none !important;
            }
          </style>

      <nav id="navmenu" class="navmenu">
        <ul class="fs-6">
          <li><a  href="/"  class=" fs-6 {{ Route::is('/') ? 'active' : '' }}">Home</a></li>


          <li><a class="fs-6 {{ Route::is('services') ? 'active' :''}}" href="{{ route('services') }}">Services</a></li>
          <li><a class="fs-6 {{ Route::is('portfolio') ? 'active' :''}}" href="{{ route('portfolio') }}">Portfolio</a></li>
          <li class="dropdown"><a class="fs-6" href=""><span>Company</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>


              <li><a class="fs-6" href="{{ route('aboutus') }}">About</a></li>

              <li><a class="fs-6" href="{{ route('teams') }}">Team</a></li>
              <li><a class="fs-6" href="{{ route('blog') }}">Blogs</a></li>

              <li><a class="fs-6" href="{{ route('termsandcondition') }}">Terms and condition</a></li>
              <li><a class="fs-6" href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
            </ul>
          </li>
          <li><a  class="fs-6 {{ Route::is('blog') ? 'active' :''}}" href="{{ route('blog') }}">Blogs</a></li>

          <li><a class="fs-6 {{ Route::is('contact') ? 'active' :''}}" href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


    </div>
  </header>



   -->


    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center ">
                   <img src="{{ asset('images/mainlogo.png') }}" style="width: 200px; height: auto; max-height: 80px;" alt="Converttree Logo">
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-purple-600 font-medium transition">Home</a>
                    <a href="https://image.converttree.com/" class="text-gray-700 hover:text-purple-600 font-medium transition">Image Tools</a>

                    <a href="#" class="text-gray-700 hover:text-purple-600 font-medium transition  cursor-not-allowed pointer-events-none">
    PDF Tools <span class="text-sm text-red-500">(Coming Soon)</span>
</a>

<a href="#" class="text-gray-700 hover:text-purple-600 font-medium transition  cursor-not-allowed pointer-events-none">
Bulk Email <span class="text-sm text-red-500">(Coming Soon)</span>
</a>

                </div>

            </div>
        </div>
    </nav>
