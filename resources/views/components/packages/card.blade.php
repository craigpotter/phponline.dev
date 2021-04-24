<div class="flex flex-col bg-white w-full mx-auto rounded-lg shadow-md hover:shadow-lg">
    <a href="{{ route('packages:show', $package->slug) }}" class="flex items-center px-6 py-3 bg-gray-900 cursor-pointer">
        <x-icons.packagist class="h-6 w-6 text-white fill-current" />
        <h3 class="mx-3 text-white font-semibold text-lg">
            {{ $package->title }}
        </h3>
        @if(! is_null($package->meta))
            @if( isset($package->meta['abandoned']) && $package->meta['abandoned'])
                <span class="text-white bg-red-400 px-4 rounded-sm">
                    Abandoned
                </span>
            @endif
        @endif
    </a>
    <div class="py-4 px-6">
        <div class="py-2 text-lg text-gray-700">
            {!! $package->body !!}
        </div>
        <a href="" class="flex items-center mt-4 text-gray-700 cursor-pointer">
            <x-icons.link-external class="h-6 w-6" />
            <p class="px-2 text-sm truncate">
                {{ $package->external_url }}
            </p>
        </a>
    </div>
</div>
