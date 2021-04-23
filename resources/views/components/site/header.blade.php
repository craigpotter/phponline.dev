<div {{ $attributes }}>
    <div class="max-w-screen-xl mx-auto px-4 py-3 sm:px-6 lg:flex lg:items-center lg:justify-between">
        {{ $slot }}

        @isset($actions)
            <div class="mt-8 flex lg:flex-shrink-0 lg:mt-0">
                <div class="inline-flex">
                    {{ $actions }}
                </div>
            </div>
        @endisset
    </div>
</div>
