@extends('admin/layouts/app')
@section('page_title', 'Blog')
@section('blog_select', 'bg-black text-white')
@section('body')
    <div class="flex gap-4 px-4 bg-white">
        <a href="{{ route('admin.blogs.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Blog </div>
    </div>

    <div class="  bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('admin.blogs.update', $blog->id) }}
        " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="py-1 px-6 ">
                <div class="flex flex-col ">
                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Title
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="title" placeholder="Enter Title Here" type="text"
                                value="{{ old('title', $blog->title) }}" />
                            @error('title')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div class="mt-1">
                        <label class='text-xs font-semibold'>Blog Image</label>
                        <div
                            class='text-xs p-1.5 form-control border border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                            <input type="file" name="featured_image" id="image"
                                class="image focus:border-[#7065d4] hover:border-[#7065d4]" onchange="loadFile(event)" />
                        </div>
                        <img class="myoldimage" src="{{ asset('/uploads/' . $blog->featured_image) }}" alt="Card"
                            style="width: 70px;margin-bottom:2px;">
                        <img id="myoutput" style="width: 70px; margin-bottom: 2px;" />

                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('myoutput');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                var old = document.getElementsByClassName('myoldimage')[0];
                                console.log(old)

                                old.classList.add("hidden");

                            };
                        </script>

                        @error('featured_image')
                            <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Image Alt
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="img_alt" placeholder="Enter Image Alt Here" type="text"
                                value="{{ old('img_alt', $blog->img_alt) }}" />
                            @error('img_alt')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Meta Title
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="meta_title" placeholder="Enter  Meta Title Here" type="text"
                                value="{{ old('meta_title', $blog->meta_title) }}" />
                            @error('meta_title')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div>
                        <label class="text-xs font-semibold w-full" for="meta_description">
                            Meta Description
                        </label>

                        <div>
                            <textarea id="meta_description" name="meta_description" placeholder="Enter meta description here"
                                class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">{{ $blog->meta_description }}</textarea>

                            @error('meta_description')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>




                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            keywords
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="keywords" placeholder="Enter keywords Here" type="text"
                                value="{{ old('keywords', $blog->keywords) }}" />
                            @error('keywords')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>





                    <div class=" text-md font-semibold w-full mt-1">
                        Description
                    </div>
                    <textarea class="tinymce border block w-full mt-1 rounded-md focus:border-[#7065d4] hover:border-[#7065d4]"
                        name="description" rows="6">{{ old('description', $blog->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                            * {{ $message }}
                        </div>
                    @enderror
                    <div>
                        <button
                            class="border mt-3 border-[#8380d4] px-4 py-1 rounded-md mr-2 text-white bg-[#8380d4] hover:bg-[#8380d4] hover:text-white">
                            Edit
                        </button>
                    </div>
                </div>
            </div>



        </form>
    </div>


@endsection
