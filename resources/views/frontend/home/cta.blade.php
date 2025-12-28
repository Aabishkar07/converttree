

    @php
        $groupedAdvertisements = $advertisements->groupBy('place');
        $featured_advertisements = $groupedAdvertisements->get('top_section', collect())->first();
        
       
    @endphp
<div class="pt-2"></div>
        <!-- Advertisement Banner -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        @if (!empty($featured_advertisements))
                    <div class="w-full  text-center border-black"><span class="text-center"><a
                                href="{{ $featured_advertisement->link ?? '#' }}" target="_blank">
                                @if ($featured_advertisements->image)
                                    <img loading="lazy"class="object-contain"
                                        src="{{ asset('images/' . $featured_advertisements->image) }}" alt="" />
                                @endif
                            </a>
                            @if ($featured_advertisements->ad_script)
                                {!! $featured_advertisements->ad_script !!}
                            @endif
                        </span>
                    </div>
              
            @endif
        </div>
    </div>


  
    
