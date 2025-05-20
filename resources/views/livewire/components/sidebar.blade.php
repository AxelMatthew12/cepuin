<nav class="bg-primary-100 p-5 fixed h-screen w-80">
    <a href="/" class="text-200 text-secondary-200 font-bold ">
        cepuin.
    </a>
    <div class="flex flex-col gap-6 mt-12">
        @foreach ($links as $link)
            <a href="{{ $link['link'] }}"
                class="flex items-center gap-3.5 font-semibold text-secondary-200 text-200 hover:bg-primary-300 transition duration-100 px-5 py-2 rounded-full w-full">

                <span class="{{ $link['icon'] }}" style="color: #eee; height: 30px; width: 30px;"></span>
                <p>{{ $link['name'] }}</p>
            </a>
        @endforeach
    </div>
</nav>
