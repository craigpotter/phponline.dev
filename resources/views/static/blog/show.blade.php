<x-app-layout>
    <x-site.header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-2xl leading-9 font-semibold tracking-tight text-white md:text-3xl md:leading-10">
            <span class="block">
                {{ ucwords($article->title) }}
            </span>
        </h2>
    </x-site.header>

    <x-site.container class="max-w-screen-xl">
        <section class="my-12">
            <div>
                author card
            </div>
            <div class="my-6 text-gray-500 mx-auto text-2xl leading-7">
                {!! $article->body !!}
            </div>
            <div>
                comments ??
            </div>
        </section>
    
    </x-site.container>
</x-app-layout>