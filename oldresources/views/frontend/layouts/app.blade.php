<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @php
        $segment = request()->segment(1);
        $meta = getMetas(Request::segment(1), Request::segment(2));
        $sitekey = getsiteKey();
        // dd($meta);
    @endphp


    {{-- <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "{{$meta->title ?? 'Converttree'}}",
        "description": "{{strip_tags($meta->description) }}",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ url('/search?q={search_term_string}') }}",
            "query-input": "required name=search_term_string"
        }
    }
    </script> --}}
    <meta name="google-site-verification" content="{{ $sitekey }}"  />

    <meta name=description content="{{ strip_tags($meta->description) }}">
    {{-- og --}}
    <meta property=og:title content="{{ $meta->title ?? 'Converttree' }}" />
    <meta property=og:description content="{{ strip_tags($meta->description) }}" />
    <meta property=og:image content="{{ 'https://Converttree.com' . $meta->image }}" />
    <meta name="keywords"
        content="{{ $meta->keymords ?? 'Converttree, software development, custom software solutions, IT services, SaaS development, mobile app development, cloud software, enterprise applications, software consulting, tech company' }}">


    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://Converttree.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $meta->title ?? 'Converttree' }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($meta->description, 50)) }}">

    {{-- <meta property="og:title" content="Home | Converttree" /> --}}
    {{-- <meta property="og:description"
        content="ConvertTree - All-in-One File Converter" /> --}}

    <meta property="og:url" content="https://Converttree.com/" />
    <meta property="og:site_name" content="Converttree" />
    <meta property="og:updated_time" content="2025-03-07T07:17:26+00:00" />
    {{-- <meta property="og:image" content="https://Converttree.com/wp-content/uploads/2024/07/cropped-Fab-icon.jpg" /> --}}
    <meta property="og:image:secure_url"
        content="https://Converttree.com/wp-content/uploads/2024/07/cropped-Fab-icon.jpg" />
    <meta property="og:image:width" content="512" />
    <meta property="og:image:height" content="512" />
    <meta property="og:image:alt" content="Converttree Fab icon" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="article:published_time" content="2024-07-22T15:27:43+00:00" />
    <meta property="article:modified_time" content="2025-03-07T07:17:26+00:00" />
    {{-- <meta name="twitter:card" content="summary_large_image" /> --}}
    {{-- <meta name="twitter:title" content="Home | Converttree" /> --}}
    {{-- <meta name="twitter:description"
        content="Discover top IT solutions including IT services, Display Marketing, and SEO services at Home/Converttree. Boost your business efficiency today!" /> --}}
    <meta name="twitter:site" content="@Converttreenepal" />
    <meta name="twitter:creator" content="@Converttreenepal" />
    <meta name="twitter:image" content="https://Converttree.com/wp-content/uploads/2024/07/cropped-Fab-icon.jpg" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="admin" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="1 minute" />


    <title>{{ $meta->title ?? 'Converttree' }}</title>

    <link rel='dns-prefetch' href='//www.googletagmanager.com' />
    <link rel="alternate" type="application/rss+xml" title="Converttree &raquo; Feed" href="https://Converttree.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Converttree &raquo; Comments Feed"
        href="https://Converttree.com/comments/feed/" />
    <link href="{{ asset('img/cropped-Fab-icon-32x32.jpg') }}" rel="icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">




    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}s" rel="stylesheet"> --}}

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

<style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .pulse-ad {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>


<body>

    <div class="font-roboto">

        <div class="sticky top-0  z-[888] ">
            @include('frontend.layouts.navbar')
        </div>

  

        <div class="">
            @yield('body')
        </div>

        <div class="">
            @include('frontend.layouts.footer')
        </div>

    </div>
</body>
{{-- <style>
    .container {
  margin-left: 14rem; /* Large screen margin */
  margin-right: 14rem;
}

/* Medium screens (md) and smaller */
@media (max-width: 992px) {
  .container {
    margin-left: 6rem;
    margin-right: 6rem;
  }
}

/* Small screens (sm) and smaller */
@media (max-width: 768px) {
  .container {
    margin-left: 2rem;
    margin-right: 2rem;
  }
}

/* Extra small screens (xs) */
@media (max-width: 576px) {
  .container {
    margin-left: 1rem;
    margin-right: 1rem;
  }
}

  </style> --}}


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script> --}}









<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('js/main.js') }}"></script>


</html>
