@php
    $groupedAdvertisements = $advertisements->groupBy('place');
    $rightAd  = $groupedAdvertisements->get('native_image_right', collect())->first();
    $bottomAd = $groupedAdvertisements->get('image_converter', collect())->first();

    $formats = [
        'JPG → PNG', 'PNG → JPG', 'JPG → WEBP', 'WEBP → PNG',
        'AVIF → JPG', 'HEIF → JPG', 'SVG → PNG', 'PNG → WEBP',
        'PNG → AVIF', 'JPEG → AVIF', 'SVG → JPG', 'HEIF → PNG',
    ];

    $otherTools = [
        ['name' => 'PDF Converter', 'url' => '#', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ['name' => 'Bulk Email Sender', 'url' => '#', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ];
@endphp

<section id="image" class="py-8 md:py-14 bg-slate-50/50">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Section Header: Centered for better focus --}}
        <header class="mb-16 text-center">
            <h2 class="mt-2 text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">
                Image Converter
            </h2>
            <p class="mt-4 text-lg text-slate-600 max-w-3xl mx-auto leading-relaxed">
                Transform your media instantly. High-quality conversions supporting the latest web formats including AVIF and WebP.
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            {{-- Left Sidebar: Tools --}}
            <aside class="lg:col-span-3 order-1 lg:order-1">
                <div class="lg:sticky lg:top-8 space-y-4">
                    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-slate-200 p-5 shadow-sm">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-2">Essential Tools</h3>
                        <nav class="space-y-1">
                            @foreach ($otherTools as $tool)
                                <a href="{{ $tool['url'] }}" 
                                   class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-700 hover:bg-white hover:text-indigo-600 hover:shadow-sm transition-all duration-200">
                                    <svg class="h-5 w-5 text-slate-400 group-hover:text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $tool['icon'] }}"/>
                                    </svg>
                                    <span class="text-sm font-medium">{{ $tool['name'] }}</span>
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </aside>

            {{-- Center Content: Main App --}}
            <main class="lg:col-span-6 order-2 lg:order-2">
                <article class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xl shadow-slate-200/50">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="p-3 bg-indigo-50 rounded-2xl">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-900">Format Specialist</h3>
                            <p class="text-sm text-slate-500">Lossless conversion with metadata preservation.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5" role="list">
                        @foreach ($formats as $format)
                            <div class="text-[11px] md:text-xs py-2 px-1 rounded-lg border border-slate-100 bg-slate-50 text-slate-600 text-center font-semibold hover:border-indigo-200 hover:bg-indigo-50 transition-colors cursor-default">
                                {{ $format }}
                            </div>
                        @endforeach
                    </div>

                    <a href="https://image.converttree.com"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="mt-8 flex items-center justify-center gap-3 w-full rounded-2xl
                              bg-slate-900 px-8 py-4 text-white font-bold
                              hover:bg-indigo-600 hover:scale-[1.01] active:scale-[0.99]
                              transition-all duration-300 shadow-lg shadow-indigo-200">
                        <span>Start Converting Free</span>
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </article>
            </main>

            {{-- Right Sidebar: Ad --}}
            <aside class="lg:col-span-3 order-3">
                @if (!empty($rightAd))
                    <div class="lg:sticky lg:top-8">
                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white p-2 shadow-sm">
                            @if ($rightAd->link)
                                <a href="{{ $rightAd->link }}" target="_blank" rel="noopener noreferrer sponsored">
                                    <img src="{{ asset('images/' . $rightAd->image) }}" alt="Ad" class="rounded-xl w-full h-auto">
                                </a>
                            @endif
                            {!! $rightAd->ad_script ?? '' !!}
                        </div>
                    </div>
                @endif
            </aside>
        </div>

        {{-- Bottom Ad: Integrated more smoothly --}}
        @if (!empty($bottomAd))
            <div class="mt-16 flex flex-col items-center">
                <span class="text-[10px] text-slate-400 font-bold uppercase mb-4 tracking-widest">Advertisement</span>
                <div class="max-w-4xl w-full bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                     {!! $bottomAd->ad_script ?? '' !!}
                     @if ($bottomAd->link && $bottomAd->image)
                        <a href="{{ $bottomAd->link }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/' . $bottomAd->image) }}" class="mx-auto rounded-lg">
                        </a>
                     @endif
                </div>
            </div>
        @endif
    </div>
</section>