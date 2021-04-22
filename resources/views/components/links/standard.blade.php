<a
    href="{{ $href }}"
    title="{{ $title }}"
    {{ $attributes->merge(['class' => 'text-md leading-9 tracking-tight font-light text-gray-500 hover:text-gray-900 hover:underline sm:text-md sm:leading-10 cursor-pointer']) }}
>
    {{ $slot }}
</a>
