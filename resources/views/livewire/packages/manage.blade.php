<x-site.container class="max-w-screen-xl">
    <div class="space-y-6">

        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Your Packages
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Add your composer package so that others in the community can find and download!
                </p>
            </div>
            <div class="ml-4 mt-4 flex-shrink-0">
                <button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit a new package
                </button>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse ($packages as $package)
                    <li>
                        <a href="#" class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <x-icons.packagist
                                            class="h-12 w-12 rounded-full p-1"
                                        />
                                    </div>
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-indigo-600 truncate">{{ $package->title }}</p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                                <x-icons.link-external
                                                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                />
                                                <span class="truncate">
                                                    {{ $package->external_url }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="hidden md:block">
                                            <div>
                                                <p class="text-sm text-gray-900">
                                                    Submitted on
                                                    <time datetime="{{ $package->created_at->toDateString() }}">{{ $package->created_at->format('d M, Y') }}</time>
                                                </p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        <x-icons.check-circle
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-{{ $package->published ? 'green' : 'gray' }}-400"
                                                        />
                                                        <span>{{ $package->published ? 'published': 'awaiting approval' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <x-icons.chevron-right class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </a>
                    </li>
                @empty
                    <li class="w-full flex items-center justify-center py-4">
                        <p class="text-md text-gray-400">
                            No packages added yet
                        </p>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>    
</x-site.container>
