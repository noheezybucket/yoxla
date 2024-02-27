@extends('base')
@section('title', 'Détail chauffeur')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="w-2/4 mx-auto space-y-5">
                <div class="flex justify-between">
                    <a wire:navigate.hover href="{{ route('admin.drivers') }}" class="font-bold text-xl flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        <span>Informations du chauffeur</span>
                    </a>
                </div>
                <div class="flex  gap-5 bg-second rounded-2xl justify-center items-center p-4">
                    <div class="flex flex-col bg-second rounded-2xl my-2 p-2">
                        <div class="flex justify-between items-center">
                            <div>
                                @include('components.label-status-driver')

                            </div>
                            <div class="flex gap-2">
                                <a wire:navigate.hover href="{{ route('admin.delete-driver', ['id' => $driver->id]) }}">
                                    <svg class="w-8 h-8 bg-red-600 text-white p-1 rounded-lg" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </a>
                                <a wire:navigate.hover href="{{ route('admin.update-driver', ['id' => $driver->id]) }}">
                                    <svg class="w-8 h-8 bg-yellow-500  text-white p-1 rounded-lg" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M18 5V4c0-.6-.4-1-1-1H9a1 1 0 0 0-.8.3l-4 4a1 1 0 0 0-.2.6V20c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-5M9 3v4c0 .6-.4 1-1 1H4m11.4.8 2.7 2.7m1.2-3.9a2 2 0 0 1 0 3l-6.6 6.6L9 18l.7-3.7 6.7-6.7a2 2 0 0 1 3 0Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-center">

                            @if ($driver->avatar)
                                <img src="{{ $driver->avatar }}" alt="" class="max-w-[300px] w-full object-contain">
                            @else
                                <svg class=" text-gray-800 dark:text-white max-w-[300px] w-full object-contain"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.3-.6-1-1-1.6-1H7.6c-.7 0-1.3.4-1.6 1M4 5h16c.6 0 1 .4 1 1v12c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                </svg>
                            @endif
                        </div>
                    </div>

                    <div>

                        <div class="flex flex-col mb-2">
                            <span class="text-4xl font-bold">{{ $driver->fullname }}</span>
                            {{-- <div class="flex justify-between">
                            <span class="vehicle-details">{{ $driver->model }}</span>
                            <span class="vehicle-details ">{{ $driver->daily_price }} XOF/jour</span>

                        </div> --}}
                        </div>

                        <div class="space-y-1 w-full">
                            <div class="flex justify-between">
                                <span>N° Permis</span>
                                <span class="font-bold">{{ $driver->license_number }}</span>
                            </div>
                            <hr>
                            <div class="flex justify-between">
                                <span>Catégorie</span>
                                <span class="font-bold">{{ $driver->license_category }}</span>
                            </div>
                            <hr>
                            <div class="flex justify-between">
                                <span>Expérience</span>
                                <span class="font-bold">{{ $driver->years_of_xp }} an(s) </span>
                            </div>
                            <hr>
                            <div class="flex justify-between">
                                <span>Date d'émission</span>
                                <span class="font-bold">
                                    {{ date('d-m-Y', strtotime($driver->license_emission_date)) }}</span>
                            </div>
                            <hr>
                            <div class="flex justify-between">
                                <span>Date d'expiration</span>
                                <span
                                    class="font-bold">{{ date('d-m-Y', strtotime($driver->license_expiration_date)) }}</span>
                            </div>
                            <hr>

                            <div class="flex justify-between">
                                <span>N° Téléphone</span>
                                <span class="font-bold">{{ $driver->phonenumber }}</span>
                            </div>
                            <hr>

                            <div class="flex justify-between">
                                <span>Voiture</span>
                                <span class="font-bold">-</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
