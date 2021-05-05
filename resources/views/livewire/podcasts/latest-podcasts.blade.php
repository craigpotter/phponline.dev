<x-site.container>
    <section class="mb-12">
        <div class="flex items-center justify-between">
            <h2 class="text-xl leading-5 tracking-tight font-semibold text-gray-900 sm:text-2xl sm:leading-10">
                Latest podcasts
            </h2>
            <x-links.standard
                href="{{ route('static:packages:index') }}"
                title="See all packages"
            >
                See all podcasts
            </x-links.standard>
        </div>
        <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 grid-cols-1 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
            @foreach ($podcasts as $podcast)
                <div class="flex bg-white w-full mx-auto rounded-lg shadow-md hover:shadow-lg h-56">
                    <div>
                        <img
                            class="w-full h-full object-fit object-center rounded hidden md:block bg-gray-900"
                            src="{{ $podcast->getImage() }}"
                            alt="{{ $podcast->title }}"
                        />
                    </div>
                    <div class="w-full p-8 flex flex-col items-center justify-center space-y-3">
                        <h3 class="text-2xl text-grey-darkest font-medium">
                            {{ $podcast->title }}
                        </h3>
                
                        <a href="" class="flex items-center mt-4 text-gray-700 cursor-pointer">
                            <x-icons.link-external class="h-6 w-6" />
                            <p class="px-2 text-sm">
                                {{ $podcast->external_url }}
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-site.container>