<section class="relative py-20 bg-gradient-to-br from-gray-50 via-purple-50/30 to-blue-50/30 overflow-hidden">
  <!-- Animated Background Elements -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    
    <!-- Section Header -->
    <div class="text-center mb-16">
      <div class="inline-flex items-center justify-center mb-4">
        <div class="w-1 h-12 rounded-full bg-gradient-to-b from-purple-600 to-blue-600 mr-4 animate-pulse"></div>
        <h2 class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-purple-600 via-blue-600 to-purple-600 bg-clip-text text-transparent animate-gradient">
          Converttree Blog
        </h2>
        <div class="w-1 h-12 rounded-full bg-gradient-to-b from-blue-600 to-purple-600 ml-4 animate-pulse"></div>
      </div>
      <p class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-600">
        Our Thoughts & Stories
      </p>
      <div class="mt-4 flex items-center justify-center gap-2">
        <div class="w-2 h-2 rounded-full bg-purple-600 animate-bounce"></div>
        <div class="w-2 h-2 rounded-full bg-blue-600 animate-bounce" style="animation-delay: 0.1s;"></div>
        <div class="w-2 h-2 rounded-full bg-purple-600 animate-bounce" style="animation-delay: 0.2s;"></div>
      </div>
    </div>

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($blogs as $key => $blog)
      <div class="group perspective-1000">
        <a href="{{ route('single', $blog->slug) }}" class="block h-full">
          <article class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 hover:rotate-1 h-full border border-gray-100 hover:border-purple-200">
            
            <!-- Gradient Overlay on Hover -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-600/0 to-blue-600/0 group-hover:from-purple-600/10 group-hover:to-blue-600/10 transition-all duration-500 z-10 pointer-events-none"></div>
            
            <!-- Featured Badge (for first post) -->
            @if($key === 0)
            <div class="absolute top-4 left-4 z-20">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold text-white bg-gradient-to-r from-purple-600 to-blue-600 shadow-lg animate-pulse">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                Featured
              </span>
            </div>
            @endif

            <!-- Image Container -->
            <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-purple-100 to-blue-100">
              <img 
                src="{{ asset('/uploads/' . $blog->featured_image) }}" 
                class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:rotate-2" 
                alt="{{ $blog->title }}"
              />
              <!-- Image Overlay Gradient -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>

            <!-- Content Container -->
            <div class="p-6 relative">
              
              <!-- Meta Information -->
              <div class="flex items-center justify-between mb-4 text-sm">
                <span class="flex items-center gap-2 text-gray-500 group-hover:text-purple-600 transition-colors duration-300">
                  <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                  </div>
                  <span class="font-medium">{{ $blog->updated_at->format('M d, Y') }}</span>
                </span>
                @if ($blog->views)
                <span class="flex items-center gap-2 text-gray-500 group-hover:text-blue-600 transition-colors duration-300">
                  <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                  </div>
                  <span class="font-medium">{{ $blog->views }}</span>
                </span>
                @endif
              </div>

              <!-- Title -->
              <h3 class="text-gray-900 text-xl font-bold mb-3 line-clamp-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-600 group-hover:to-blue-600 transition-all duration-300 leading-tight">
                {{ $blog->title }}
              </h3>

              <!-- Description -->
              <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-5 group-hover:text-gray-700 transition-colors duration-300">
                {!! Str::limit(strip_tags($blog->description), 120) !!}
              </p>

              <!-- Footer -->
              <div class="flex items-center justify-between pt-4 border-t border-gray-100 group-hover:border-purple-200 transition-colors duration-300">
                <div class="relative inline-flex items-center gap-2 px-6 py-2.5 rounded-full font-semibold text-sm overflow-hidden group/btn">
                  <!-- Animated Background -->
                  <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-blue-600 transition-transform duration-300 group-hover/btn:scale-105"></div>
                  <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                  
                  <!-- Button Content -->
                  <span class="relative z-10 text-white">Read More</span>
                  <svg class="relative z-10 w-4 h-4 text-white transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                  </svg>
                </div>
                
                @if($blog->reading_time)
                <span class="flex items-center gap-1.5 text-xs font-medium text-gray-500 group-hover:text-purple-600 transition-colors duration-300">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  {{ $blog->reading_time }} min
                </span>
                @endif
              </div>
            </div>

            <!-- Decorative Corner Element -->
            <div class="absolute top-0 right-0 w-20 h-20 transform translate-x-10 -translate-y-10 bg-gradient-to-br from-purple-600 to-blue-600 rounded-full opacity-0 group-hover:opacity-20 blur-2xl transition-all duration-500"></div>
          </article>
        </a>
      </div>
      @endforeach
    </div>

  </div>

  <!-- CSS Animations -->
  <style>
    @keyframes gradient {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }
    
    @keyframes blob {
      0%, 100% { transform: translate(0, 0) scale(1); }
      33% { transform: translate(30px, -50px) scale(1.1); }
      66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    
    .animate-gradient {
      background-size: 200% 200%;
      animation: gradient 3s ease infinite;
    }
    
    .animate-blob {
      animation: blob 7s infinite;
    }
    
    .animation-delay-2000 {
      animation-delay: 2s;
    }
    
    .animation-delay-4000 {
      animation-delay: 4s;
    }
    
    .perspective-1000 {
      perspective: 1000px;
    }
  </style>
</section>