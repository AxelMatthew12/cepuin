<nav class="bg-primary-200 lg:p-5 px-2 fixed h-screen lg:w-80 w-fit z-10">
    <a href="/" class="text-200 text-secondary-200 font-bold lg:block hidden">
        cepuin.
    </a>
    <div class="flex flex-col gap-6 mt-12">
        @foreach ($links as $link)
            <a href="{{ $link['link'] }}"
                class="flex items-center gap-3.5 font-semibold text-secondary-200 text-200 hover:bg-primary-300 transition duration-100 lg:px-5 px-3 py-2 rounded-full w-full">

                <span class="{{ $link['icon'] }} size-6 lg:size-8"></span>
                <p class="lg:block hidden">{{ $link['name'] }}</p>
            </a>
        @endforeach
    </div>
</nav>
