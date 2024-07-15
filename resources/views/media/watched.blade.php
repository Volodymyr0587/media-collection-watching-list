<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watched') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 flex justify-end items-center">
                    <div class="mr-2 relative" x-data="{ open: false, selected: '{{ request('category_id') ? $categories->firstWhere('id', request('category_id'))->name : 'All Categories' }}' }">
                        <label for="category_id" class="sr-only">Filter by Category:</label>
                        <div class="inline-block">
                            <button @click="open = !open" @click.away="open = false" type="button" class="inline-flex justify-between w-48 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span x-text="selected"></span>
                                <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06-.02L10 10.89l3.71-3.7a.75.75 0 111.06 1.06l-4.25 4.24a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div x-show="open" class="origin-top-left absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="{{ route('media.watched', ['category_id' => '']) }}" @click="selected = 'All Categories'; open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-transform duration-300 ease-in-out hover:translate-x-1">All Categories</a>
                                @foreach($categories as $category)
                                    <a href="{{ route('media.watched', ['category_id' => $category->id]) }}" @click="selected = '{{ $category->name }}'; open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-transform duration-300 ease-in-out hover:translate-x-1">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                              <table
                                class="min-w-full text-left text-sm font-light text-surface">
                                <thead
                                  class="border-b border-neutral-200 font-medium dark:border-white/10">
                                  <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Poster</th>
                                    <th scope="col" class="px-6 py-4">Name</th>
                                    <th scope="col" class="px-6 py-4">Categories</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user_media as $media)
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <img class="h-50 w-20" src="{{ $media->image ? asset('storage/' . $media->image) : asset('storage/images/media.jpg') }}" alt="">
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a class="text-indigo-500 font-bold hover:underline hover:text-indigo-800" href="{{ route('media.show', $media) }}">{{ $media->title }}</a>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            @foreach ($media->categories as $category)
                                                <a href="{{ route('media.watched', ['category_id' => $category->id]) }}" class="p-2 bg-amber-300 rounded-full">{{ $category->name }}</a>
                                            @endforeach
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 flex items-center gap-2">
                                            <a href="{{ route("media.edit", $media) }}" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Edit</a>
                                            @can('edit', $media)
                                            <form action="{{ route('media.destroy', $media) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this media?');"
                                                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                      </tr>
                                    @empty
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">No Media created yet.</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="m-4">
                    {{ $user_media->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
