<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search results for ') }} <span class="text-indigo-700 font-bold ">{{ $search }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

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
                                    @forelse ($results as $media)
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
                                                <a href="{{ route('media.index', ['category_id' => $category->id]) }}" class="p-2 bg-amber-300 rounded-full">{{ $category->name }}</a>
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

                {{-- <div class="m-4">
                    {{ $results->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
