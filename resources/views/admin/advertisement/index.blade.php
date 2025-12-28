@extends('admin/layouts/app')


@section('body')
    <div class="w-full px-5 py-5">
    @include('admin.include.toastmessage')
        <div class="flex justify-between">
            <div class="text-2xl font-bold"> Advertisement</div>
            <div class="flex">
                <a href='{{ route('admin.advertisement.create') }}'
                    class=' bg-[#2e3092] text-white h-10 p-2 text-sm flex gap-2 items-center rounded-lg'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z" />
                    </svg>
                    <span>Add Advertisement</span>
                </a>
            </div>
        </div>
        <div class="py-3 ">
            <div class="mt-1">
                {{-- -mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto z-[0] max-h-screen overflow-y-auto --}}
                <div class="relative p-3 mt-10 bg-white shadow product-tablerounded-lg ">
                    <div class="overflow-x-auto ">
                        {{-- max-h-screen min-w-full shadow rounded-lg z-[0] overflow-y-hidden --}}
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="">
                                <tr>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Name</th>

                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Type</th>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Placed On</th>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Status</th>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Expiry Date</th>

                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Actions</th>
                                </tr>
                            </thead>


                            @foreach ($advertisements as $key => $advertisement)
                                <tbody class="bg-white divide-y divide-gray-200 ">
                                    <tr>
                                        <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $advertisement->name }}</p>
                                        </td>

                                        <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $advertisement->type }}</p>
                                        </td>
                                        <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $advertisement->place }}</p>
                                        </td>
                                        <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @if ($advertisement->status == 'active')
                                                    <span class="px-2 text-white bg-green-600 rounded">
                                                        Active
                                                    </span>
                                                @endif
                                                @if ($advertisement->status == 'inactive')
                                                    <span class="px-2 text-white bg-red-600 rounded">
                                                        Inactive
                                                    </span>
                                                @endif
                                            </p>
                                        </td>



                                        <td class="px-5 py-3 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @if ($advertisement->expiry_date > $today)
                                                    {{ $advertisement->expiry_date }}
                                                @else
                                                    <span class="px-2 text-white bg-red-600 rounded">
                                                        Expired
                                                    </span>
                                                @endif
                                            </p>
                                        </td>


                                        <td class="z-[999]">
                                            <div class="flex gap-x-2">

                                                <div class="">

                                                    <a href="{{ route('admin.advertisement.edit', $advertisement->id) }}"
                                                        class="block px-4 py-2 text-sm text-white rounded-md hover:bg-sky-500 bg-sky-600">Edit
                                                    </a>



                                                </div>
                                                <form method="POST"
                                                    action="{{ route('admin.advertisement.destroy', $advertisement->id) }}"
                                                    id="delete-form-{{ $advertisement->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        onclick="deletemuimage(event, {{ $advertisement->id }})"
                                                        class="flex w-full items-center gap-2    px-4 py-1.5 text-md openModal text-white rounded text-center bg-red-700 hover:bg-red-600">
                                                        <span class="pl-2">
                                                            Delete
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach

                        </table>

                    </div>
                </div>
                {{-- <div class="z-0 mt-3">
                    {{ $advertisement->links('vendor.pagination.tailwind') }}
                </div> --}}
            </div>
        </div>
    </div>
    <script>
        function deletemuimage(event, imageId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this Property!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    document.getElementById('delete-form-' + imageId).submit();
                }
            });
        }
    </script>
@endsection
