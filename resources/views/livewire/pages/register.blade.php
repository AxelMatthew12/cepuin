<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<div class="min-h-screen flex font-sans">
    <!-- Left Side - Register Form (Now Bigger) -->
    <div class="w-2/3 relative flex items-center justify-center">
        <div class="absolute inset-0 bg-primary-200"></div>

        <div class="relative z-10 flex items-center justify-center  p-4">
            <div id="register-box"
                 class="bg-white opacity-0 transition-opacity duration-500 w-[450px] p-10 rounded-xl shadow-md text-center"
                 style="font-family: 'Plus Jakarta Sans', sans-serif;">

                <h1 class="text-3xl font-bold text-[#26202E] mb-2">
                    Daftar akun Cepuin<span class="text-gray-800">.</span>
                </h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="#" class="mt-6 space-y-4 text-left">
                    @csrf
                    <div>
                        <input name="name" type="text" placeholder="Nama"
                               class="w-full p-3 border rounded-lg placeholder-gray-500 text-sm text-black focus:outline-none focus:ring-2 focus:ring-[#a066da]">
                        @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input name="email" type="email" placeholder="Email"
                               class="w-full p-3 border rounded-lg placeholder-gray-500 text-sm text-black focus:outline-none focus:ring-2 focus:ring-[#a066da]">
                        @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input name="password" type="password" placeholder="Password"
                               class="w-full p-3 border rounded-lg placeholder-gray-500 text-sm text-black focus:outline-none focus:ring-2 focus:ring-[#a066da]">
                        @error('password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <input name="password_confirmation" type="password" placeholder="Konfirmasi password"
                               class="w-full p-3 border rounded-lg placeholder-gray-500 text-sm text-black focus:outline-none focus:ring-2 focus:ring-[#a066da]">
                    </div>
                    <button type="submit"
                            class="w-full bg-[#a066da] hover:bg-[#8f4dd0] text-white py-3 rounded-lg font-medium mt-2 transition">
                        Daftar
                    </button>
                </form>

                <div class="my-6 flex items-center">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-3 text-sm text-gray-500">atau</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <a href="#"
                   class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-lg flex items-center justify-center gap-2 transition hover:bg-gray-100">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5">
                    <span class="text-sm font-medium">Daftar dengan Google</span>
                </a>

                <p class="text-sm text-gray-600 mt-6">Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-[#a066da] font-semibold hover:underline">Masuk</a>
                </p>
            </div>
        </div>
    </div>

    @include('livewire.components.pattern-side')

<!-- Fade in effect -->
<script>
    window.addEventListener("load", () => {
        const registerBox = document.getElementById("register-box");
        if (registerBox) registerBox.classList.remove("opacity-0");
    });
</script>
