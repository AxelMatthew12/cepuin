<div class="min-h-screen flex flex-col md:flex-row w-full items-stretch">
    <div
        class="w-full md:w-1/2 h-screen flex items-center justify-center bg-primary-200 md:fixed md:left-0 md:top-0 md:h-full">
        @include('livewire.components.pattern-side')
    </div>

    <!-- Login Side -->
    <div
        class="w-full md:fixed md:right-0 md:top-0 md:h-full md:w-1/2 bg-primary-400 flex items-center justify-center max-h-screen">
        <div class="w-full max-w-sm p-8 rounded-2xl shadow ring-1 ring-gray-200 bg-secondary-200">
            <div class="text-center mb-6">
                <h2 class="text-100 font-bold text-primary-100">cepuin.</h2>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <input type="email" name="email" placeholder="Email address"
                    class="w-full rounded-md border px-4 py-3 text-secondary-100 font-medium" />

                <div class="relative w-full">
                    <input id="passwordInput" type="password" placeholder="Password" name="password"
                        class="w-full rounded-md border px-4 py-3 text-secondary-100 font-medium pr-12" />
                    <span id="togglePassword"
                        class="{{ config('constants.icon.eye') }} text-xl text-gray-500 absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer"></span>
                </div>

                <button type="submit" class="w-full py-3 bg-primary-400 text-white font-bold rounded-md">Login</button>

            </form>
            <form action="{{ route('google.login') }}" method="get">
                @csrf
                <button type="submit"
                    class="w-full py-2 mt-2 bg-primary-100 text-white rounded-md font-semibold flex items-center justify-center gap-2">
                    <span class="{{ config('constants.icon.google') }} text-xl"></span>
                    Login pakai Google
                </button>
            </form>
            <p class="text-center text-sm mt-4 text-primary-200">
                Tidak punya akun? <a href="register" class="text-primary-100 font-bold">daftar</a>
            </p>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
