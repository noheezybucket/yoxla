<header class=" py-5 flex justify-between items-center">
    <div class="flex gap-1">
        <h1 class="text-4xl font-bold text-white  px-2 pb-1 bg-third rounded-2xl">
            yoxlā
        </h1>
        <h2 class="text-4xl   rounded-2xl">admin</h2>

    </div>

    <div class="bg-second flex border  p-1 rounded-full ">
        <div class="bg-white py-1 rounded-3xl w-10 h-10 flex justify-center items-center">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
        </div>

        <div class="text-third  flex  items-center">
            <input class="text-center w-[200px] block bg-second focus:outline-none" placeholder="Recherche" />
        </div>
    </div>

    <div class="flex gap-1">
        <div><x-fas-user class="icon rounded-2xl border border-black p-1" /></div>
        <span wire:navigate class="font-light">{{ auth()->guard('admin')->user()->fullname }}</span>
    </div>
</header>
