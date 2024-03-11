@extends('base')
@section('title', 'Détail du véhicule')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')


        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex justify-between  w-full  ">
                <div class=" w-full p-2 space-y-3">
                    <div class="flex justify-between">

                        <a wire:navigate.hover href="{{ route('admin.vehicles') }}"
                            class="font-bold text-xl flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                            <span>Détails du véhicule</span>
                        </a>
                    </div>
                    <div class="border borde-second rounded-2xl p-2 shadow-lg h-[73vh] ">
                        <div>

                            <div class="flex flex-col bg-second rounded-2xl my-2 p-2">
                                <div class="flex justify-between items-center">
                                    <div>
                                        @include('components.label-status')

                                    </div>
                                    <div class="flex gap-2">
                                        <a wire:navigate.hover
                                            href="{{ route('admin.delete-vehicle', ['id' => $vehicle->id]) }}">
                                            <svg class="w-8 h-8 bg-red-600 text-white p-1 rounded-lg" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a>
                                        <a wire:navigate.hover
                                            href="{{ route('admin.update-vehicle', ['id' => $vehicle->id]) }}">
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

                                    <img src="{{ $vehicle->photos }}" alt=""
                                        class="max-w-[350px] w-full object-contain">
                                    <div class="flex flex-col justify-center">
                                        <div class="flex flex-col">
                                            <span class="font-bold text-2xl">{{ $vehicle->brand }}</span>
                                            <span class="font-bold text-2xl">{{ $vehicle->model }}</span>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-xl">{{ $vehicle->seats }}</span>
                                            <span>Places</span>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-xl">{{ $vehicle->daily_price }}</span>
                                            <span>XOF/jour</span>
                                        </div>
                                        <div class="font-semibold text-xl">
                                            <span>{{ $vehicle->gearbox === 'auto' ? 'Automatique' : 'Manuelle' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold text-2xl">Plus de détails</span>
                                <div class="flex justify-between">
                                    <span>Kilométrage actuel</span>
                                    <span class="font-bold">{{ $vehicle->actual_mileage }} Km</span>
                                </div>
                                <hr>
                                <div class="flex justify-between">
                                    <span>Kilométrage à l'achat</span>
                                    <span class="font-bold">{{ $vehicle->origin_mileage }} Km</span>
                                </div>
                                <hr>
                                <div class="flex justify-between">
                                    <span>Date d'achat</span>
                                    <span class="font-bold">{{ date('d-m-Y', strtotime($vehicle->purchase_date)) }}</span>
                                </div>
                                <hr>
                                <div class="flex justify-between">
                                    <span>Matricule</span>
                                    <span class="font-bold">DK {{ $vehicle->registration }}</span>
                                </div>
                                <hr>
                                <div class="flex justify-between">
                                    <span>Couleur</span>
                                    <span class="font-bold">{{ $vehicle->color }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class=" w-full h-[80vh] flex flex-col gap-2 justify-between  px-2 rounded-2xl">
                    <div class="h-1/2 rounded-2xl overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15122.381296094887!2d-17.49097350213938!3d14.717170679757682!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec16d534e06f1a9%3A0x69717a61f4de4688!2sBira%20Ouakam%20trois%20poteaux%20lampes!5e0!3m2!1sfr!2ssn!4v1708691353174!5m2!1sfr!2ssn"
                            class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="w-full rounded-2xl bg-second h-1/2 p-2 flex items-center justify-center">
                        {{-- <h2 class="font-bold text-xl text-white">Informations de booking</h2> --}}
                        @if ($vehicle->driver_id === null)
                            <div class="flex flex-col items-center gap-3">

                                <svg class="w-14 h-14 text-third dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.3-.6-1-1-1.6-1H7.6c-.7 0-1.3.4-1.6 1M4 5h16c.6 0 1 .4 1 1v12c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                </svg>
                                <span class="text-third">Cette voiture n'a pas de chauffeur pour le moment !</span>
                                <a href="{{ route('admin.update-vehicle', ['id' => $vehicle->id]) }}"
                                    class="btn-secondary">
                                    Attribuer un chauffeur <x-fas-plus class="icon" />
                                </a>
                            </div>
                    </div>
                @else
                    <div class="flex justify-around w-full gap-3">

                        @if ($vehicle->driver->avatar)
                            <img src="{{ $vehicle->driver->avatar }}" alt=""
                                class="max-w-[200px] w-full object-contain">
                        @else
                            <svg class=" text-gray-800 dark:text-white max-w-[200px] w-full object-contain"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.3-.6-1-1-1.6-1H7.6c-.7 0-1.3.4-1.6 1M4 5h16c.6 0 1 .4 1 1v12c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                        @endif
                        <div class="flex flex-col w-full justify-center gap-1">
                            <div class="flex justify-between">
                                <span>Nom complet</span>
                                <span class="font-bold">{{ $vehicle->driver->fullname }}</span>
                            </div>
                            <hr>

                            <div class="flex justify-between">
                                <span>N° Permis</span>
                                <span class="font-bold">{{ $vehicle->driver->license_number }}</span>
                            </div>
                            <hr>
                            <div class="flex justify-between">
                                <span>Catégorie</span>
                                <span class="font-bold">{{ $vehicle->driver->license_category }}</span>
                            </div>
                            <hr>

                            <div class="flex gap-1 items-center">
                                @for ($i = 0; $i < $vehicle->driver->years_of_xp; $i++)
                                    <span class="avg"></span>
                                @endfor
                                @for ($i = $vehicle->driver->years_of_xp; $i < 5; $i++)
                                    <span class="avg-no"></span>
                                @endfor
                                <span class="font-bold">XP</span>
                            </div>
                            <hr>

                            <a href="{{ route('admin.show-driver', ['id' => $vehicle->driver->id]) }}"
                                class="btn-primary">Plus de détails sur le chauffeur</a>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
