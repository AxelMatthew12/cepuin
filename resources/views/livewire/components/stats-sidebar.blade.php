<div class="bg-primary-200 h-screen w-80 text-secondary-200 lg:flex hidden flex-col gap-5">
    <section class="sticky top-0 bg-primary-200 p-5 z-10">
        <search class="bg-primary-300 px-5 py-2 rounded-full flex items-center gap-1 w-full ">
            <span class="{{ config('constants.icon.search') }} size-6 text-secondary-200"></span>
            <input type="text" placeholder="Cari" class="bg-transparent focus:outline-none w-full">
        </search>
    </section>
    <section class="flex flex-col px-5 gap-5">
        {{-- topic statistic --}}
        <div class="bg-primary-300 p-5 rounded-[10px] flex flex-col gap-5">
            <div class="flex items-center gap-2.5 border-b border-secondary-200 pb-2">
                <span class="{{ config('constants.icon.statistic') }} size-6 text-secondary-200"></span>
                <h1 class="text-300 font-bold">Statistik topik</h1>
            </div>

            <div class="flex flex-col gap-3.5">
                @foreach ($topics as $topic)
                    <a href="{{ $topic['link'] }}" class="flex justify-between hover:underline">
                        <h1 class="text-400 font-medium">{{ $topic['name'] }}</h1>
                        <h1 class="text-500 font-normal text-secondary-100">{{ $topic['post_count'] }} Postingan</h1>
                    </a>
                @endforeach
                <a href="/" class="text-secondary-100 hover:underline text-400">Lebih lengkap...</a>
            </div>
        </div>
        {{-- region statistic --}}
        <div class="bg-primary-300 p-5 rounded-[10px] flex flex-col gap-5">
            <div class="flex items-center gap-2.5 border-b border-secondary-200 pb-2">
                <span class="{{ config('constants.icon.location-2') }} size-6"></span>
                <h1 class="text-300 font-bold">Statistik daerah</h1>
            </div>

            <div class="flex flex-col gap-3.5">
                @foreach ($regions as $region)
                    <a href="{{ $region['link'] }}" class="flex justify-between hover:underline">
                        <h1 class="text-400 font-medium">{{ $region['name'] }}</h1>
                        <h1 class="text-500 font-normal text-secondary-100">{{ $region['post_count'] }} Postingan</h1>
                    </a>
                @endforeach
                <a href="/" class="text-secondary-100 hover:underline text-400">Lebih lengkap...</a>
            </div>
        </div>
    </section>
</div>
