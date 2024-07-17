<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $media->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="rounded-lg bg-white shadow-secondary-1 text-surface flex flex-col sm:flex-row">
                        <div class="relative overflow-hidden bg-cover bg-no-repeat w-full sm:w-1/3 h-auto sm:h-auto">
                            <img class="rounded-lg w-full object-cover"
                                src="{{ $media->image ? asset('storage/' . $media->image) : asset('storage/images/media.jpg') }}"
                                alt="" />
                        </div>

                        <div class="px-6 mt-6 sm:mt-0 w-full sm:w-2/3 flex flex-col">
                            <a href="{{ url()->previous() }}" class="inline-flex w-1/3 items-center space-x-2 rounded-md px-3 py-2 text-sm font-semibold shadow-md hover:text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <x-svg.back-button />
                                <span>Back</span>
                            </a>

                            <p class="my-4 text-base font-bold text-surface/75">
                                @foreach ($media->categories as $category)
                                <small>{{ $category->name }}</small>
                                @endforeach
                            </p>

                            @if ($media->year)
                            <p class="my-4 text-xl font-bold text-surface/75">
                                <small>Year: {{ $media->year }}</small>
                            </p>
                            @endif

                            @if ($media->country)
                            <p class="my-4 text-xl font-bold text-surface/75">
                                <small>Country: {{ $media->country }}</small>
                            </p>
                            @endif

                            @if ($media->season)
                            <p class="my-4 text-xl font-bold text-surface/75">
                                <small>Season Number: {{ $media->season }}</small>
                            </p>
                            @endif

                            @if ($media->series)
                            <p class="my-4 text-xl font-bold text-surface/75">
                                <small>Series Number: {{ $media->series }}</small>
                            </p>
                            @endif

                            <p class="my-4 text-xl font-bold text-surface/75">
                                <small>Status: {{ $media->watched ? 'Watched' : 'Not Watched' }}</small>
                            </p>

                            <p class="my-4 text-xl text-surface/75">
                                <small> Created {{ $media->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="mb-2 text-xl font-medium leading-tight">
                            {{ $media->title }}
                        </h5>

                        <h5 class="mb-2 text-lg font-medium italic leading-tight">
                            {{ $media->origin_title }}
                        </h5>

                        <div class="mb-2">
                            {{ $media->description }}
                        </div>
                    </div>

                    @if ($media->isSeries())
                    <h2 class="my-4 font-bold text-xl">Episodes</h2>
                    <form action="{{ route('media.updateEpisodes', $media->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4 ml-4 flex flex-wrap">
                        @for ($i = 1; $i <= $media->series; $i++)
                            <div class="w-1/2 sm:w-1/4 lg:w-1/6 p-2">
                                <input type="checkbox" id="episode{{ $i }}" name="episodes[]" value="{{ $i }}"
                                class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                                {{ in_array($i, old('episodes', $media->watched_episodes ?? [])) ? 'checked' : '' }}>
                                <label for="episode{{ $i }}" class="inline-block ps-[0.15rem] hover:cursor-pointer">Episode {{ $i }}</label>
                            </div>
                        @endfor
                        </div>
                        <div class="flex justify-end">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Episodes</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
