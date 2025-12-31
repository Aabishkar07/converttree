<!-- LinkedIn-Style Navigation Bar -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-[1128px] mx-auto px-4">
        <div class="flex items-center justify-between h-[52px]">
            <!-- Left: Logo + Search -->
            <div class="flex items-center gap-2">
                <!-- Logo -->
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/mainlogo.png') }}" class="h-9" alt="ConvertTree">
                </a>
                
                <!-- Search Bar (Desktop) -->
                <div class="hidden lg:block ml-2">
                    <div class="relative">
                        <input type="text" placeholder="Search tools..." class="w-[280px] h-[34px] pl-10 pr-4 bg-[#EEF3F8] rounded text-sm focus:outline-none focus:bg-white focus:ring-1 focus:ring-purple-500 transition-all">
                        <svg class="absolute left-3 top-2 w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Right: Navigation Icons -->
            <div class="flex items-center">
                <nav class="hidden md:flex items-center">
                    <!-- Home -->
                    <a href="/" class="flex flex-col items-center justify-center w-[80px] h-[52px] text-gray-600 hover:text-gray-900 transition-colors {{ Request::is('/') ? 'text-gray-900 border-b-2 border-gray-900' : '' }}">
                        <svg class="w-6 h-6 mb-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.5 11.8c0 .1 0 .3-.1.4-.1.1-.1.2-.2.3l-10.8 9.6c-.2.1-.4.2-.5.2s-.4-.1-.6-.2L.5 12.5c-.2-.1-.3-.3-.4-.5 0-.1-.1-.3-.1-.4 0-.3.1-.5.3-.7l1.4-1.4c.2-.2.4-.3.6-.3.3 0 .5.1.7.3l8.9 7.9 8.9-7.9c.2-.2.4-.3.7-.3s.5.1.6.3l1.4 1.4c.3.2.4.5.4.7z"></path>
                        </svg>
                        <span class="text-xs font-normal">Home</span>
                    </a>

                    <!-- Image Tools -->
                    <a href="https://image.converttree.com/" target="_blank" class="flex flex-col items-center justify-center w-[80px] h-[52px] text-gray-600 hover:text-gray-900 transition-colors">
                        <svg class="w-6 h-6 mb-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-1.96-2.36L6.5 17h11l-3.54-4.71z"></path>
                        </svg>
                        <span class="text-xs font-normal">Images</span>
                    </a>

                    <!-- PDF Tools -->
                    <div class="flex flex-col items-center justify-center w-[80px] h-[52px] text-gray-400 cursor-not-allowed relative">
                        <svg class="w-6 h-6 mb-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"></path>
                        </svg>
                        <span class="text-xs font-normal">PDF</span>
                        <span class="absolute top-1 right-4 bg-purple-100 text-purple-700 text-[10px] px-1.5 py-0.5 rounded-full font-medium">Soon</span>
                    </div>

                    <!-- Bulk Email -->
                    <div class="flex flex-col items-center justify-center w-[80px] h-[52px] text-gray-400 cursor-not-allowed relative">
                        <svg class="w-6 h-6 mb-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path>
                        </svg>
                        <span class="text-xs font-normal">Email</span>
                        <span class="absolute top-1 right-4 bg-purple-100 text-purple-700 text-[10px] px-1.5 py-0.5 rounded-full font-medium">Soon</span>
                    </div>

                    <!-- Divider -->
                    <div class="h-8 w-[1px] bg-gray-300 mx-2"></div>

                    <!-- Try Free Button -->
                    <a href="https://image.converttree.com/" target="_blank" class="ml-2 px-4 py-1.5 text-purple-600 border border-purple-600 rounded-full text-sm font-semibold hover:bg-purple-50 hover:border-purple-700 hover:text-purple-700 transition-all">
                        Try for Free
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg mobile-menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden border-t border-gray-200 bg-white">
        <div class="px-4 py-2 space-y-1">
            <a href="/" class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg {{ Request::is('/') ? 'bg-gray-50 font-semibold' : '' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"></path></svg>
                Home
            </a>
            <a href="https://image.converttree.com/" target="_blank" class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"></path></svg>
                Image Tools
            </a>
            <div class="flex items-center gap-3 px-3 py-2 text-gray-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6z"></path></svg>
                PDF Tools <span class="text-xs text-purple-600">(Coming Soon)</span>
            </div>
            <div class="flex items-center gap-3 px-3 py-2 text-gray-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2z"></path></svg>
                Bulk Email <span class="text-xs text-purple-600">(Coming Soon)</span>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.querySelector('.mobile-menu-btn');
    const menu = document.querySelector('.mobile-menu');
    btn?.addEventListener('click', () => menu.classList.toggle('hidden'));
});
</script>