<div class="min-h-screen flex font-sans">
    {{-- Left Side - Login Form --}}
    <div class="w-2/3 relative flex items-center justify-center">
        {{-- Background --}}
        <div class="absolute inset-0 bg-primary-200"></div>

        {{-- Login Box --}}
        <div class="relative z-10 flex items-center justify-center p-4">
            <div id="login-box"
                 class="bg-white opacity-0 transition-opacity duration-500 w-[450px] p-10 rounded-xl shadow-md text-center"
                 style="font-family: 'Plus Jakarta Sans', sans-serif;">

                {{-- Title --}}
                <h1 class="text-3xl font-bold text-[#26202E] mb-2">
                    Masuk ke Cepuin<span class="text-gray-800">.</span>
                </h1>

                {{-- Login Form --}}
                <form method="POST" action="{{ url('/login') }}" class="mt-6 space-y-4 text-left">
                    @csrf
                    <div>
                        <input type="email" name="email" placeholder="Email"
                               class="w-full p-3 border rounded-lg placeholder-gray-500 text-sm text-black focus:outline-none focus:ring-2 focus:ring-[#a066da]"
                               value="{{ old('email') }}" required autofocus />
                    </div>

                    <div>
                        <input type="password" name="password" placeholder="Password"
                               class="w-full p-3 border rounded-lg placeholder-gray-500 text-sm text-black focus:outline-none focus:ring-2 focus:ring-[#a066da]"
                               required />
                    </div>

                    <button type="submit"
                            class="w-full bg-[#a066da] hover:bg-[#8f4dd0] text-white py-3 rounded-lg font-medium mt-2 transition">
                        Login
                    </button>
                </form>

                {{-- Divider --}}
                <div class="my-6 flex items-center">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-3 text-sm text-gray-500">atau</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                {{-- Google Button --}}
                <button onclick="window.location.href='#'"
                        class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg flex items-center justify-center gap-2 transition hover:bg-gray-100">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" loading="lazy" />
                    <span class="text-sm font-medium">Login pakai Google</span>
                </button>

                {{-- Register Redirect --}}
                <p class="text-sm text-gray-600 mt-6">
                    Tidak punya akun?
                    <a href="/register" class="text-[#a066da] font-semibold hover:underline">Daftar</a>
                </p>
            </div>
        </div>
    </div>

    {{-- Right Side - Pattern Image --}}
    @include('livewire.components.pattern-side')
</div>

<script>
    window.addEventListener("load", () => {
        const loginBox = document.getElementById("login-box");
        if (loginBox) loginBox.classList.remove("opacity-0");
    });
</script>
