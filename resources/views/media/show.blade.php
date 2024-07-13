<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Media') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="rounded-lg bg-white shadow-secondary-1 text-surface flex flex-col sm:flex-row">
                        <div class="relative overflow-hidden bg-cover bg-no-repeat w-full sm:w-1/3">
                            <img class="rounded-lg h-full object-cover"
                                src="{{ $media->image ? asset('storage/' . $media->image) : asset('storage/images/media.jpg') }}"
                                alt="" />
                        </div>

                        <div class="p-6 w-full sm:w-2/3">
                            {{-- <a href="{{ url()->previous() }}" class="space-x-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <x-svg.back-button />
                                Back
                            </a> --}}
                            <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 rounded-md px-3 py-2 text-sm font-semibold shadow-md hover:text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <x-svg.back-button />
                                <span>Back</span>
                            </a>

                            <p class="my-4 text-base font-bold text-surface/75">
                                @foreach ($media->categories as $category)
                                <small>{{ $category->name }}</small>
                                @endforeach
                            </p>
                            <h5 class="mb-2 text-xl font-medium leading-tight">
                                {{ $media->title }}
                            </h5>
                            <p class="mb-4 text-base">
                                {{ $media->description }}
                            </p>
                            <p class="text-base text-surface/75">
                                <small>{{ $media->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
