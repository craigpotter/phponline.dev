<x-app-layout>
    <x-site.header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-white md:text-3xl md:leading-10">
            <span class="block">
                Latest Blog Posts
            </span>
        </h2>
        <x-slot name="actions">
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <span class="ml-3 shadow-sm rounded-md">
                    @auth
                        <a
                            href="{{ route('dashboard:articles:index') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline-indigo focus:border-red-600 active:bg-gray-50 transition duration-150 ease-in-out"
                        >
                          Submit an article
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline-indigo focus:border-red-600 active:bg-gray-50 transition duration-150 ease-in-out"
                        >
                          Log in to submit
                        </a>
                    @endauth
              </span>
            </div>
        </x-slot>
    </x-site.header>

    <x-site.container>
        <section class="mb-12">
            <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
                @foreach ($articles as $article)
                    <x-articles.card
                        :key="$article->id"
                        :article="$article"
                    />
                @endforeach
            </div>
        </section>

        <div class="pb-12">
            {{ $articles->links() }}
        </div>
    </x-site.container>
</x-app-layout>
