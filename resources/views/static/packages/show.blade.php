<x-app-layout>
    <x-site.header class="py-6 bg-gray-900 mb-12">
        <h2 class="text-3xl leading-9 font-semibold tracking-tight text-white md:text-4xl md:leading-10">
            <a href="" target="__blank" rel="noopener"
               class="inline-flex items-center space-x-3">
                <x-icons.link-external class="w-6 h-6"/>
                <span>
                    {{ $package->title }}
                </span>
            </a>
        </h2>
        {{-- @auth
            <x-slot name="actions">
                <livewire:user.bookmark-button
                    :model="$package"
                />
            </x-slot>
        @endauth --}}
    </x-site.header>

    <x-site.container>
        <section class="my-12">
            <div class="w-full text-md leading-7 text-gray-700">
                {!! $package->body !!}
            </div>
        </section>

        @if(! is_null($package->meta))
            <section class="my-12">
                <div>
                    <div class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow md:grid-cols-4">
                        <div>
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        Package Version
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->meta['version'] ?? 'no version published' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 md:border-0 md:border-l">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        Package Type
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->meta['type'] ?? 'no type registered' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 md:border-0 md:border-l">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        License
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->meta['license'][0] ?? 'license not readable' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 md:border-0 md:border-l">
                            <div class="px-4 py-5 sm:p-6">
                                <dl>
                                    <dt class="text-base leading-6 font-normal text-gray-900">
                                        PHP Version
                                    </dt>
                                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                                        <div
                                            class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                            {{ $package->meta['require']['php'] ?? 'unknown' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section class="my-12">
                <x-packages.dependency-list
                    title="Required Dependencies"
                    :dependencies="$package->meta['require']"
                />
            </section>

            <section class="my-12">
                <x-packages.dependency-list
                    title="Development Dependencies"
                    :dependencies="$package->meta['require-dev']"
                />
            </section>

            @isset($package->meta['funding'])
                <section class="my-12">
                    <x-packages.funding-card
                        :data="$package->meta['funding']"
                    />
                </section>
            @endisset
        @endif

    </x-site.container>
</x-app-layout>
