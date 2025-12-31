@extends('frontend.layouts.app')
@section('body')



    @include('frontend.home.landing')
   
   



@include('frontend.home.whyus')

   



    @php
        $groupedplaceAdvertisements = $advertisements->groupBy('place');
        $blog_video = $groupedplaceAdvertisements->get('above_blog', collect())->first();
        $script=$blog_video->ad_script ?? null;
       
    @endphp



<style>
    .video-fit {
        height: 220px;              /* 👈 set your desired height */
        width: 100%;
        overflow: hidden;
        position: relative;
    }

    .video-fit video,
    .video-fit iframe {
        width: 100%;
        height: 100%;
        object-fit: contain;        /* 👈 keeps full video visible */
    }
</style>

@if($script)
    <div class="w-full max-w-4xl mx-auto my-6 p-4 bg-white rounded-lg shadow-md">
        <div class="video-fit">
            {!! $script !!}
        </div>
    </div>
@endif





    

    @include('frontend.home.blog')
@endsection










   




 



