<div class="bg-white lg:min-w-0 lg:flex-1">
    <div class="pl-4 pr-6 pt-4 pb-4 border-b border-t border-gray-200 sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-6 xl:border-t-0">
        <div class="flex items-center">
            <h3 class="flex-1 text-lg leading-7 font-medium">
                Funding
            </h3>
        </div>
    </div>

    <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 p-6">
        @foreach ($data as $person)
            <li class="col-span-1 bg-white rounded-lg shadow hover:shadow-lg">
                <a
                    href="{{ $person['url'] }}"
                    rel="nofollow noopener"
                    target="_blank"
                >
                    <div>
                        <img
                            alt="avatar"
                            class="w-full h-56 object-cover object-center"
                            src="{{ $person['url'] }}.png"
                        />
                    </div>
                    <div class="flex items-center px-6 py-3 bg-gray-900">                        
                        <x-icons.github
                            class="h-6 w-6 text-gray-100"
                        />
                        <p class="mx-3 text-white font-semibold text-lg">
                            {{ $person['url'] }}
                        </p>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>