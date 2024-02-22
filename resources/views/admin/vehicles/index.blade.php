@extends('base')
@section('title', 'Véhicules')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex gap-5  w-full h-[80vh]">
                <div class="w-1/3 border p-1">
                    <p class="font-bold text-2xl">Filter</p>
                </div>
                <div class="w-2/3 p-2 space-y-4 overflow-y-scroll">
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold text-2xl">Véhicules</h1>
                        <a href="{{ route('admin.create-vehicle') }}" class="btn-secondary">Ajouter un véhicule <x-fas-plus
                                class="icon mr-0" /></a>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="vehicle-card">
                                <div class="space-y-3">
                                    <span class="available label">Disponible</span>
                                    <span class="unavailable label">En location</span>
                                    <span class="breakdown label">En panne</span>
                                </div>
                                <img src="{{ asset('assets/bmw.png') }}" alt="" class="">
                                <h2 class="vehicle-brand">BMW</h2>
                                <div class="flex justify-between">
                                    <h2 class="vehicle-details">X3 Hybrid</h2>
                                    <h2 class="vehicle-details">25.000 XOF/jour </h2>
                                </div>
                            </div>
                        @endfor


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
