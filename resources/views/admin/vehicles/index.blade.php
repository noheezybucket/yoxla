@extends('base')
@section('title', 'Véhicules')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')
        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex gap-5  w-full h-[80vh]">
                <div class="w-1/3 border p-4 rounded-2xl bg-second space-y-2 ">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-2xl">Filtres</span>
                        <span class="font-normal  text-md text-accent1">Reset</span>
                    </div>
                    <form action="" class="space-y-2">
                        <div class="form-div-row">
                            <div class="form-div w-full">
                                <label for="brand" class="form-label">Marque</label>
                                <select name="brand" id="brand" class="form-input">
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->brand }}">{{ $vehicle->brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-div w-full">
                                <label for="model" class="form-label">Modèle</label>
                                <select name="model" id="model" class="form-input">
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->model }}">{{ $vehicle->model }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-div border">
                            <label for="prices" class="form-label">Prix</label>
                            <input type="range" name="prices" id="prices">
                        </div>
                        <div>
                            <div class="form-div-row">
                                <input type="checkbox" name="type" id="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-2/3 p-2 space-y-4 overflow-y-scroll">
                    <div class="flex justify-between items-center">
                        <h1 class="font-bold text-2xl">Véhicules</h1>
                        <a wire:navigate.hover href="{{ route('admin.create-vehicle') }}" class="btn-secondary">Ajouter un
                            véhicule <x-fas-plus class="icon mr-0" /></a>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($vehicles as $vehicle)
                            <a wire:navigate.hover href="{{ url('admin/vehicles/show/' . $vehicle->id) }}"
                                class="vehicle-card">
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
