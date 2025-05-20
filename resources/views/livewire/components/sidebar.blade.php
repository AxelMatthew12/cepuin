<nav class="bg-primary-200 lg:p-5 px-2 fixed h-screen lg:w-80 w-fit z-10 flex flex-col text-secondary-200">
    <a href="/" class="text-200 font-bold lg:block hidden mb-10">
        cepuin.
    </a>
    <div class="h-full flex flex-col justify-between">
        <div class="flex flex-col gap-6">
            @foreach ($links as $link)
                <a href="{{ $link['link'] }}"
                    class="flex items-center gap-3.5 font-semibold text-200 hover:bg-primary-300 transition duration-100 lg:px-5 px-3 py-2 rounded-full w-full">

                    <span class="{{ $link['icon'] }} size-6 lg:size-8"></span>
                    <p class="lg:block hidden">{{ $link['name'] }}</p>
                </a>
            @endforeach
        </div>

        <a href="/profile" class="bg-primary-300 w-full px-5 py-2.5 rounded-md flex justify-between items-center">
            <div class="flex gap-2.5">
                <img src="{{ asset('assets/images/frieren.jpg') }}" class="size-10 rounded-full object-cover"
                    alt="profile">
                <div>
                    <p class="font-semibold -mb-1">User</p>
                    <p class="text-secondary-100">@user96</p>
                </div>
            </div>
            <span class="{{ config('constants.icon.more') }} size-6"></span>
        </a>
    </div>
</nav>
