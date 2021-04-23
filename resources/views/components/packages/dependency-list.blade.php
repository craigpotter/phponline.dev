<div class="bg-white lg:min-w-0 lg:flex-1">
    <div class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
        <div class="flex items-center">
            <h3 class="flex-1 text-lg leading-7 font-medium">
                {{ $title }}
            </h3>
        </div>
    </div>

    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 p-6">
        @foreach ($dependencies as $package => $version)
            <li class="col-span-1 bg-white rounded-lg shadow">
                <div class="w-full flex items-center justify-between p-6 space-x-6">
                    <div class="flex-1 truncate">
                        <a href="https://packagist.org/packages/{{ $package }}#{{ $version }}" rel="nofollow noopener" target="_blank" class="flex items-center justify-between space-x-3">
                            <h3 class="text-gray-900 text-sm leading-5 font-medium truncate flex items-center space-x-3">
                                <x-icons.link-external
                                    class="h-4 w-4"
                                />
                                <span>{{ $package }}</span>
                            </h3>
                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-teal-800 text-xs leading-4 font-medium bg-teal-100 rounded-full">
                                {{ $version }}
                            </span>
                        </a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
