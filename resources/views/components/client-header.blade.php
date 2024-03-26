<header class=" py-5 flex justify-between items-center">
    <div class="flex gap-1">
        <h1 class="text-4xl font-bold text-white  px-2 pb-1 bg-accent1 rounded-2xl">
            yoxlā
        </h1>
        <h2 class="text-4xl   rounded-2xl">client</h2>
    </div>

    {{-- <div class="bg-second flex border  p-1 rounded-full ">
        <div class="bg-white py-1 rounded-3xl w-10 h-10 flex justify-center items-center">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
        </div>

        <div class="text-third  flex  items-center">
            <p class="text-center w-[200px] ">Recherche</p>
        </div>
    </div> --}}
    <div class="flex gap-1">
        <div><x-fas-user class="icon text-accent1 border border-accent1 p-1 rounded-2xl" /></div>
        <span wire:navigate class="font-light">{{ auth()->guard('client')->user()->fullname }}</span>
    </div>
</header>
