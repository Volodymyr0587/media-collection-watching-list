<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('media.update', $media) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Media</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Edit your favorite movies, series, anime, etc</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Media Title</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="title" id="title" autocomplete="title" value="{{ $media->title }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="Attack on Titan">
                                            </div>
                                            @error('title')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="origin_title" class="block text-sm font-medium leading-6 text-gray-900">Origin Media Title (optional)</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="origin_title" id="origin_title" autocomplete="origin_title" value="{{ $media->origin_title }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="Attack on Titan">
                                            </div>
                                            @error('origin_title')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="year" class="block text-sm font-medium leading-6 text-gray-900">Year (optional)</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="number" name="year" id="year" autocomplete="year" value="{{ $media->year }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                >
                                            </div>
                                            @error('year')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country (optional)</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="country" id="country" autocomplete="country" value="{{ $media->country }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="Japan">
                                            </div>
                                            @error('country')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                        <div class="mt-2">
                                            <textarea name="description" id="description" rows="4"
                                                class="block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-600 sm:text-sm"
                                                placeholder="A brief description of the media">{{ $media->description }}</textarea>
                                            @error('description')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="season" class="block text-sm font-medium leading-6 text-gray-900">Season number (You can leave it blank)</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="number" name="season" id="season" autocomplete="season" value="{{ $media->season }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="1">
                                            </div>
                                            @error('season')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="series" class="block text-sm font-medium leading-6 text-gray-900">Series number (You can leave it blank)</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="number" name="series" id="series" autocomplete="series" value="{{ $media->series }}"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    placeholder="1">
                                            </div>
                                            @error('series')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                                        <div class="mt-2">
                                            <input type="file" name="image" id="image" onchange="validateFileSize(this)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-600">
                                            @error('image')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="additional_images" class="block text-sm font-medium leading-6 text-gray-900">Additional Images</label>
                                        <div class="mt-2">
                                            <input type="file" name="additional_images[]" id="additional_images" multiple onchange="validateFileSize(this)" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:border-indigo-600">
                                            @error('additional_images')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="sm:col-span-4">
                                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                            @foreach($media->images as $image)
                                                <div class="relative">
                                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Additional Image" class="w-full h-auto transition duration-300 ease-in-out hover:scale-150">
                                                    <label class="absolute top-0 right-0 bg-white bg-opacity-75 p-1">
                                                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                                        Delete
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div> --}}

                                    <div class="sm:col-span-4">
                                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                            @foreach($media->images as $image)
                                                <div class="relative" x-data="{ isModalOpen: false }">
                                                    <img
                                                        src="{{ asset('storage/' . $image->path) }}"
                                                        alt="Additional Image"
                                                        class="w-full h-auto transition duration-300 ease-in-out hover:scale-150 cursor-pointer"
                                                        @click="isModalOpen = true"
                                                    >

                                                    <label class="absolute top-0 right-0 bg-white bg-opacity-75 p-1">
                                                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                                        Delete
                                                    </label>

                                                    <!-- Modal -->
                                                    <div
                                                        x-show="isModalOpen"
                                                        class="fixed inset-0 flex items-center justify-center z-50"
                                                        style="background-color: rgba(0, 0, 0, 0.5);"
                                                        @click.away="isModalOpen = false"
                                                    >
                                                        <div class="relative max-w-4xl p-10">
                                                            <img
                                                                src="{{ asset('storage/' . $image->path) }}"
                                                                alt="Modal Image"
                                                                class="w-full h-auto"
                                                            >

                                                            <!-- Close button -->
                                                            <button type="button"
                                                                class="absolute -top-7 -right-2  text-8xl font-bold  align-center cursor-pointer alert-del  text-white hover:text-blue-800"
                                                                @click="isModalOpen = false; $event.stopPropagation()"
                                                            >
                                                                &times;
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- End of Modal -->
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4 flex items-center">
                                        <label for="watched" class="block text-sm font-medium leading-6 text-gray-900">Watched</label>
                                        <div class="ml-2">
                                            <input type="checkbox" name="watched" id="watched" value="1" {{ old('watched', $media->watched ? 'checked' : '') }} class="block">
                                            @error('watched')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-4">
                                        <label for="categories" class="block text-sm font-medium leading-6 text-gray-900">Categories</label>
                                        <div class="mt-2">
                                            <select name="categories[]" id="categories" class="block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-600 sm:text-sm" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ in_array($category->id, old('categories', $media->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('categories')
                                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ $media->watched ? route('media.watched') : route('media.index') }}" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            if (file && file.size > 10 * 1024 * 1024) { // 10MB
                alert('The file size exceeds the maximum limit of 10MB.');
                input.value = ''; // Clear the input
            }
        }
    </script>

</x-app-layout>
