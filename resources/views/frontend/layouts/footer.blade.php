
    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                     <div class="flex items-center ">
                   <img src="{{ asset('images/mainlogo.png') }}" style="width: 200px; height: auto; max-height: 80px;" alt="Converttree Logo">
                </div>
                    <p class="text-white my-4  text-md">Your all in one tool for file conversion and bulk emailing fast, free, and secure. Convert images, PDFs, and documents instantly, and send bulk emails to thousands with ease.</p>

                </div>
                <div>
                    <h4 class="font-bold text-lg text-white mb-4">Services</h4>
                    <ul class="space-y-2 text-white">
                        <li><a href="" class="hover:text-white transition">PDF Tools</a></li>
                        <li><a href="https://image.converttree.com/" class="hover:text-white transition">Image Tools</a></li>
                        <li><a href="" class="hover:text-white transition">Bulk Email</a></li>

                    </ul>
                </div>
                <div>
<h4 class="font-semibold text-sm mb-2 text-white">Blogs</h4>

<ul class="space-y-2">
    @foreach ($blogs as $blog)
    <li class="group">
        <a href="{{ route('single', $blog->slug) }}" class="flex items-center space-x-2">
            <div class="w-14 h-14 overflow-hidden rounded-md flex-shrink-0">
                <img
                    src="{{ asset('/uploads/' . $blog->featured_image) }}"
                    alt="{{ $blog->title }}"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                />
            </div>
            <h5 class="text-xs text-white font-normal group-hover:text-gray-300 transition">
                {{ $blog->title }}
            </h5>
        </a>
    </li>
    @endforeach
</ul>

</div>

                <div>
                    <h4 class="font-bold text-lg mb-4 text-white">Company</h4>
                    <ul class="space-y-2 text-white">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>

                        <li><a href="#" class="hover:text-white transition">Terms and Condition</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-white">
                <p>&copy; {{date('Y')}} ConvertTree. All rights reserved. Made with ❤️ for file conversion enthusiasts.</p>
                <p class="mt-2 text-sm">Powered by <a href="https://www.softsaro.com" target="_blank" class="hover:underline" style="color: #6a6bcf;">Softsaro</a></p>
            </div>
        </div>
    </footer>
