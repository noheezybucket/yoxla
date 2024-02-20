<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center justify-between">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <span class="ml-3 text-5xl font-bold">yoxlā</span>
        </a>

        <div class="flex gap-5">

            <a href="{{ route('auth.login') }}"
                class="inline-flex items-center bg-first text-white border-0 py-3 px-3 focus:outline-none hover:bg-third rounded-2xl text-base mt-4 md:mt-0">Se
                connecter
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>

            {{-- <a href=""
                class="inline-flex items-center bg-accent1 text-white border-0 py-3 px-3 focus:outline-none hover:bg-third rounded-2xl text-base mt-4 md:mt-0">Démonstration

            </a> --}}
        </div>
    </div>
</header>
