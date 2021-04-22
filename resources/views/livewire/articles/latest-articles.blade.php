<x-site.container>
    <section class="mb-12">
        <div class="flex items-center justify-between">
            <h2 class="text-xl leading-5 tracking-tight font-semibold text-gray-900 sm:text-2xl sm:leading-10">
                Latest articles
            </h2>
            <x-links.standard
                href="#"
                title="See all articles"
            >
                See all articles
            </x-links.standard>
        </div>
        <div class="mt-6 grid gap-16 border-t-2 border-gray-100 pt-3 grid-cols-1 lg:grid-cols-3 lg:gap-x-5 lg:gap-y-12">
            @foreach ($articles as $article)
                <x-articles.card
                    :key="$article->id"
                    :article="$article"
                />
            @endforeach
        </div>
    </section>
</x-site.container>