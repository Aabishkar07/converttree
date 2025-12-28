<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 flex items-center justify-center">
        <span class="w-2 h-10 rounded mr-4" style="background-color: #6a6bcf;"></span>
        Converttree Blog
      </h2>
      <p class="text-xl font-medium" style="color: #6a6bcf;">Our Thoughts & Stories</p>
    </div>

 
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($blogs as $key => $blog)
      <div class="group">
        <a href="{{ route('single', $blog->slug) }}" class="block">
          <article class="bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 h-full">
   
            <div class="aspect-[3/2] overflow-hidden">
              <img 
                src="{{ asset('/uploads/' . $blog->featured_image) }}" 
                class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" 
                alt="{{ $blog->title }}"
              />
            </div>

           
            <div class="p-6">
         
              <div class="flex items-center justify-between mb-4 text-sm text-gray-500">
                <span class="flex items-center gap-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                  {{ $blog->updated_at->format('jS M Y') }}
                </span>
                @if ($blog->views)
                <span class="flex items-center gap-2">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                  {{ $blog->views }}
                </span>
                @endif
              </div>

        
              <h3 class="text-slate-900 text-xl font-semibold mb-3 line-clamp-2 transition-colors duration-300" style="hover:color: #6a6bcf;">
                {{ $blog->title }}
              </h3>

              <p class="mt-3 text-sm text-slate-500 leading-relaxed line-clamp-3 mb-4">
                {!! Str::limit(strip_tags($blog->description), 120) !!}
              </p>

              <div class="flex items-center justify-between">
                <button type="button" class="px-6 py-2.5 rounded-lg text-white text-sm font-medium tracking-wider border-none outline-none transition-colors duration-300 cursor-pointer" style="background-color: #6a6bcf; hover:background-color: #5a5bbf;">
                  Read More
                </button>
                @if($blog->reading_time)
                <span class="text-xs text-gray-400">{{ $blog->reading_time }} min read</span>
                @endif
              </div>
            </div>
          </article>
        </a>
      </div>
      @endforeach
    </div>


    @if($blogs && $blogs->count() > 0)
    <div class="text-center mt-12">
      <a href="{{ route('blog') }}" class="inline-flex items-center px-8 py-3 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" style="background: linear-gradient(135deg, #6a6bcf 0%, #5a5bbf 100%);">
        <span>View All Posts</span>
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
      </a>
    </div>
    @endif
  </div>
</section>