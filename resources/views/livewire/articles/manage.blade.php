<x-site.container class="max-w-screen-xl">
    <div class="space-y-6">

        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Your Articles
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Add new articles to help inspire and teach the community.
                </p>
            </div>
            <div class="ml-4 mt-4 flex-shrink-0">
                <a href="{{ route('dashboard:articles:create') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit a new article
                </a>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @forelse($articles as $article)
                    <li>
                        <a href="#" class="block hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-indigo-600 truncate">
                                        {{ $article->title }}
                                    </p>
                                    <div class="ml-2 flex-shrink-0 flex">
                                        <p
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $article->published() ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}"
                                        >
                                            {{ $article->published() ? 'published': 'not published' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <x-icons.users
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            />
                                            {{ $article->author->name }}
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <x-icons.book-open
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                            />
                                            {{ $article->category->name }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                        <x-icons.calendar
                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                        />
                                        <p>
                                            Created:
                                            <time datetime="{{ $article->created_at->toDateTimeString() }}">
                                                {{ $article->created_at->diffForHumans() }}
                                            </time>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @empty
                    <li>
                        <x-site.empty>
                            <p>No articles created yet, why not add some?</p>
                        </x-site.empty>
                    </li>
                @endforelse
            </ul>
        </div>

    </div>
</x-site.container>