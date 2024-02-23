@extends('base')
@section('title', 'Véhicules')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex gap-5  w-full h-[80vh]">
                <div class="w-1/3 border p-1 rounded-2xl">
                    <div class="flex">
                        <x-fas-filter class="icon" />
                        <p class="font-bold text-2xl">Filter</p>

                    </div>
                </div>
                <div class="w-2/3 p-2 space-y-4 overflow-y-scroll">
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold text-2xl">Véhicules</h1>
                        <a href="{{ route('admin.create-vehicle') }}" class="btn-secondary">Ajouter un véhicule <x-fas-plus
                                class="icon mr-0" /></a>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($vehicles as $vehicle)
                            <a href="{{ url('admin/vehicles/show/' . $vehicle->id) }}" class="vehicle-card">
                                <div class="space-y-3">
                                    @include('components.label-status')

                                </div>

                                <img src="{{ $vehicle->photos }}" alt="" class="">
                                <h2 class="vehicle-brand">{{ $vehicle->brand }}</h2>
                                <div class="flex justify-between">
                                    <h2 class="vehicle-details">{{ $vehicle->model }}</h2>
                                    <h2 class="vehicle-details">{{ $vehicle->daily_price }} XOF/jour </h2>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
