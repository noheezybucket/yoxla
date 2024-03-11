<aside class="h-[80vh] flex flex-col justify-between">
    <div class="space-y-1 flex flex-col items-center">
        {{-- home --}}
        <a wire:navigate.hover href="{{ route('driver.home') }}"
            class="block p-2 rounded-2xl hover:text-white {{ request()->is('driver/dashboard') ? 'bg-accent2 text-white' : 'text-accent2 dark:text-white hover:bg-accent2' }}">
            <svg class="menu-icon " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m4 12 8-8 8 8M6 10.5V19c0 .6.4 1 1 1h3v-3c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v3h3c.6 0 1-.4 1-1v-8.5" />
            </svg>
        </a>




        {{-- rent --}}
        {{-- <a wire:navigate.hover href="{{ route('admin.rentals') }}"
            class="block p-2 rounded-2xl hover:text-white {{ request()->is('admin/rentals*') ? 'bg-third text-white' : 'text-third dark:text-white hover:bg-third' }}">
            <svg class="menu-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 10h16m-10 5h4m-2 2v-4m0-6V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.5-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z" />
            </svg>

        </a> --}}




    </div>

    <div class="space-y-2">
        {{-- help --}}
        {{-- <a wire:navigate href="{{ route('admin.assistance') }}"
            class="block p-2 rounded-2xl hover:text-white {{ request()->is('admin/assistance*') ? 'bg-third text-white' : 'text-third dark:text-white hover:bg-third' }}">
            <svg class="menu-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.5 10a2.5 2.5 0 1 1 5 .2 2.4 2.4 0 0 1-2.5 2.4V14m0 3h0m9-5a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a> --}}

        {{-- settings --}}
        {{-- <a wire:navigate href="{{ route('admin.settings') }}"
            class="block p-2 rounded-2xl hover:text-white {{ request()->is('admin/settings*') ? 'bg-third text-white' : 'text-third dark:text-white hover:bg-third' }}">
            <svg class="menu-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 13v-2a1 1 0 0 0-1-1h-.8l-.7-1.7.6-.5a1 1 0 0 0 0-1.5L17.7 5a1 1 0 0 0-1.5 0l-.5.6-1.7-.7V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.8l-1.7.7-.5-.6a1 1 0 0 0-1.5 0L5 6.3a1 1 0 0 0 0 1.5l.6.5-.7 1.7H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.8l.7 1.7-.6.5a1 1 0 0 0 0 1.5L6.3 19a1 1 0 0 0 1.5 0l.5-.6 1.7.7v.8a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.8l1.7-.7.5.6a1 1 0 0 0 1.5 0l1.4-1.4a1 1 0 0 0 0-1.5l-.6-.5.7-1.7h.8a1 1 0 0 0 1-1Z" />
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            </svg>
        </a> --}}

        {{-- logout --}}
        <a wire:navigate href="{{ route('driver.logout') }}"
            class="block p-2 rounded-2xl hover:text-white text-red-600 dark:text-white hover:bg-red-600">
            <svg class="menu-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
            </svg>
        </a>
    </div>

</aside>
