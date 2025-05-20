<div class="w-full min-h-screen text-secondary-200 border-x border-secondary-200 h-fit py-2 lg:py-0">
    <!-- Mobile Search Bar -->
    <section class="bg-primary-200 w-full block lg:hidden px-4 py-2">
        <div class="bg-primary-300 px-4 py-2 rounded-full flex items-center gap-2 w-full">
            <span class="{{ config('constants.icon.search') }} size-6 text-secondary-200"></span>
            <input type="text" placeholder="Cari"
                class="bg-transparent focus:outline-none w-full placeholder:text-400  text-sm">
        </div>
    </section>
    <!-- Post Section -->
    <livewire:components.post-field />

    <section class="mt-10">
        {{-- post cards --}}
        @for ($i = 0; $i < 3; $i++)
            <livewire:components.post-card />
        @endfor
    </section>

    <script>
        const textarea = document.getElementById('postInput');
        textarea.addEventListener('input', () => {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        });
    </script>
</div>
