@extends('admin/layouts/app')

@section('body')
    <div class="py-4 md:px-10">

        <div class="flex gap-4">
            <a href="{{ route('admin.advertisement.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="text-xl font-bold">Add Advertisement</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg row mt-30 text-slate-600">
            <form method="post" action="{{ route('admin.advertisement.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="p-6 mt-3">
                    <div class="flex flex-col ">
                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Title
                            </label>
                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="name" placeholder="Enter name Here" type="text"
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Radio Buttons to Choose Between Image and Script -->
                        <div class="mt-3">
                            <label class='text-sm font-semibold'>Choose Type</label>
                            <div class="flex gap-4 mt-2">
                                <label>
                                    <input type="radio" name="type" value="image" checked onchange="toggleFields()">
                                    Image
                                </label>
                                <label>
                                    <input type="radio" name="type" value="script" onchange="toggleFields()"> Script
                                </label>
                            </div>
                        </div>

                        <!-- Image Upload Field -->
                        <div id="imageField" class="mt-3">
                            <label class='text-sm font-semibold'>Advertisement Image</label>
                            <div
                                class='w-full p-2 mt-2 mb-1 text-sm border rounded-md shadow-sm form-control border-grey-400'>
                                <input type="file" name="image"
                                    class="image hover:border-[#7065d4] focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4]"
                                    onchange="loadFile(event)" />
                            </div>
                            <img loading="lazy"id="output" style="width: 70px; margin-bottom: 2px;" />
                            @error('image')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror

                            <div>
                                <label class="w-full text-sm font-semibold" htmlFor="">
                                    Link
                                </label>
                                <div>
                                    <input
                                        class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                        name="link" placeholder="Enter link Here" type="text"
                                        value="{{ old('link') }}" />
                                    @error('link')
                                        <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Script Textarea Field -->
                        <div id="scriptField" class="mt-3" style="display: none;">
                            <label class='text-sm font-semibold'>Advertisement Script</label>
                            <textarea name="ad_script"
                                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4]"
                                placeholder="Enter script here"></textarea>
                            @error('ad_script')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <div class="mt-3">
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Expiry Date
                            </label>
                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-1 hover:border-[#7065d4] w-full"
                                    name="expiry_date" type="date" required value="{{ old('expiry_date') }}" />
                                @error('expiry_date')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Dropdown for Featured or Most View -->
                        <!-- {{-- <div class="mt-3">
                            <label class='text-sm font-semibold'>Select Area</label>
                            <select name="place" required
                                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4]">
                                <option selected disabled value="">Choose area</option>
                                <option value="top_section">Top Main Section (900 px * 240 px)</option>
                                <option value="featured">Above Recent Product (1600 px * 133 px)</option>
                                <option value="most_view"> Above Most View Product (1600 px * 133 px)</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->slug }}"> Above {{ $category->categoryname }} (1600 px *
                                        133 px)
                                    </option>
                                @endforeach
                            </select>
                        </div> --}} -->


                        <!-- Dropdown for Featured or Most View -->
                        <div class="mt-3">
                            <label class="text-lg font-semibold ">Select Area</label>
                            <div class="md:flex">
                                <div>
                                    <div class="py-2 text-lg text-center text-blue-600 text-bold">Homepage</div>
                                    <div class="space-y-2">
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="top_section" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                               Top Main Section (1200 px * 100 px) 
                                            </div>
                                        </label>

                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="image_converter" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                After Image Converter (1200 px * 100 px)
                                            </div>
                                        </label>

                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="above_pdf_converter" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                Above Pdf Converter (1200 px * 200 px)
                                            </div>
                                        </label>

                                          <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="after_pdf_converter" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                After Pdf Converter (1200 px * 300 px)
                                            </div>
                                        </label>
                                        
                                          <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="above_blog" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                Above Blog (1920 px * 1080 px)
                                            </div>
                                        </label>

                                    
                                    </div>
                                </div>

                                <div>
                                    <div class="py-2 text-lg text-center text-blue-600 text-bold max-md:my-3">Native Ads
                                    </div>
                                    <div class="space-y-2">
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="native_image_right" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                In Image Converter Right Side (600 px * 600 px)
                                            </div>
                                        </label>

                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="native_image_left" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                In Image Converter Left Side (600 px * 600 px)
                                            </div>
                                        </label>

                                     

                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="radio" name="place" value="pdf_converter" required
                                                class="hidden peer">
                                            <div
                                                class="w-full p-3 border border-gray-300 rounded-md peer-checked:border-[#7065d4] peer-checked:ring-2 peer-checked:ring-[#7065d4] transition hover:bg-gray-100">
                                                Pdf Converter (200 px * 1200 px)
                                            </div>
                                        </label>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-3">
                            <label class='text-sm font-semibold'>Active / Inactive</label>
                            <select name="status" required
                                class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4]">
                                <option disabled value="">Choose status</option>
                                <option selected value="active">Active</option>
                                <option value="inactive">Inctive</option>
                            </select>
                        </div>

                        <script>
                            function toggleFields() {
                                const imageField = document.getElementById('imageField');
                                const scriptField = document.getElementById('scriptField');
                                const type = document.querySelector('input[name="type"]:checked').value;

                                if (type === 'image') {
                                    imageField.style.display = 'block';
                                    scriptField.style.display = 'none';
                                } else {
                                    imageField.style.display = 'none';
                                    scriptField.style.display = 'block';
                                }
                            }
                        </script>


                        <div>
                            <button
                                class="border mt-5 bg-[#2e3092] border-[#2e3092] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#2e3092]">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
