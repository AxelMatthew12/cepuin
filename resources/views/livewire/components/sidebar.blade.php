<nav class="bg-primary-200 p-5 border-r border-secondary-200 h-full w-[25%]">
    <a href="/" class="text-200 text-secondary-200 font-bold ">
        cepuin.
    </a>

    <div class="flex flex-col gap-6 mt-12">
        @foreach ($links as $link)
            <a href="{{ $link['link'] }}"
                class="font-semibold text-secondary-200 text-200 hover:bg-primary-300 transition duration-100 px-5 py-2 rounded-full">{{ $link['name'] }}</a>
        @endforeach
    </div>
</nav>
