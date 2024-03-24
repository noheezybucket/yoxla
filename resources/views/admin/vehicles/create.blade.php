@extends('base')
@section('title', 'Nouveau véhicule')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex flex-col gap-5  w-full h-[80vh] overflow-y-scroll">
                <div class="w-3/4 mx-auto p-2 space-y-3">
                    <div class="flex justify-between">

                        <a wire:navigate.hover href="{{ route('admin.vehicles') }}"
                            class="font-bold text-xl flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                            <span>Ajouter un véhicule</span>
                        </a>
                    </div>

                    <form action="{{ route('admin.create-vehicle-treatment') }}" method="POST" class=" space-y-5">
                        @if (session('status'))
                            <div class="success">{{ session('status') }}</div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="error">{{ $error }}</div>
                        @endforeach
                        @csrf
                        {{-- basic car info --}}
                        <fieldset class="field">
                            <legend class="field-legend">Informations générales</legend>
                            <div class="form-div-row">
                                <div class="form-div w-full">
                                    <label for="brand" class="form-label">Marque</label>
                                    <input type="text" id="brand" name="brand" class="form-input"
                                        value="{{ old('brand') }}">
                                </div>
                                <div class="form-div w-full">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" id="model" name="model" class="form-input"
                                        value="{{ old('model') }}">
                                </div>

                                <div class="form-div w-full">
                                    <label for="seats" class="form-label">Nombre de sièges</label>
                                    <input type="number" id="seats" name="seats" class="form-input"
                                        value="{{ old('seats') }}">
                                </div>
                            </div>

                            <div>
                                {{-- date --}}
                                <div class="form-div-row">

                                    <div class="form-div w-full">
                                        <label for="purchase_date" class="form-label">Date d'achat du véhicule</label>
                                        <input type="date" id="purchase_date" name="purchase_date" class="form-input"
                                            value="{{ old('purchase_date') }}">
                                    </div>

                                    <div class="form-div w-full">
                                        <label for="mileage" class="form-label">Kilométrage à l'achat</label>
                                        <input type="number" id="mileage" name="mileage" class="form-input"
                                            value="{{ old('mileage') }}">
                                    </div>
                                </div>

                                <div class="form-div w-full">
                                    <label for="registration" class="form-label">Immatriculation</label>
                                    <input type="number" id="registration" name="registration" class="form-input"
                                        value="{{ old('registration') }}">
                                </div>

                                <div class="form-div w-full">
                                    <label for="type" class="input-label">Type de véhicule</label>
                                    <select name="type" id="type" class="form-input">
                                        <option value="bus">Bus</option>
                                        <option value="truck">Camion</option>
                                        <option value="berline">Berline</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-div">
                                <div class="form-div">

                                    <div class="flex items-center gap-5">
                                        <div>
                                            <input type="radio" id="gearbox" name="gearbox" class="form-input"
                                                value="auto">
                                            <label for="gearbox" class="form-label">Automatique</label>
                                        </div>

                                        <div>
                                            <input type="radio" id="gearbox" name="gearbox" class="form-input"
                                                value="manual">
                                            <label for="gearbox" class="form-label">Manuelle</label>
                                        </div>
                                        <div>
                                            <label for="color" class="form-label">Couleur</label>
                                            <input type="color" id="color" name="color" class=""
                                                value="{{ old('color') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="field">
                            <legend class="field-legend">Chauffeur</legend>
                            <div class="form-div">
                                <label for="driver_id" class="form-label">Nom & Prénom</label>
                                <select name="driver_id" id="driver_id" class="form-input">
                                    <option selected></option>
                                    @foreach ($drivers as $driver)
                                        @if (date('Y-m-d H:i:s') < $driver->license_expiration_date && $driver->vehicle === null)
                                            <option value="{{ $driver->id }}">{{ $driver->fullname }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>

                        {{-- tarification --}}
                        <fieldset class="field">
                            <legend class="field-legend">Tarification</legend>
                            <div class="form-div-row">

                                <div class="form-div w-full">
                                    <label for="daily_price" class="form-label">Tarif journalier</label>
                                    <input type="number" id="daily_price" name="daily_price" class="form-input"
                                        value="{{ old('daily_price') }}">
                                </div>
                                <div class="form-div w-full">
                                    <label for="hourly_price" class="form-label">Tarif horaire</label>
                                    <input type="text" id="hourly_price" name="hourly_price" class="form-input"
                                        value="{{ old('hourly_price') }}">
                                </div>
                            </div>
                        </fieldset>

                        {{-- photos --}}
                        <fieldset class="field">
                            <legend class="field-legend">Photos</legend>
                            <div class="form-div-row">

                                <div class="form-div w-full">
                                    <label for="photos" class="form-label">URL Photos</label>
                                    <input type="text" id="photos" name="photos" class="form-input"
                                        value="{{ old('photos') }}">
                                </div>

                            </div>
                        </fieldset>

                        <button type="submit" class="btn-primary">Enregistrer <x-fas-plus class="icon" /></button>

                    </form>
                </div>
            </div>

        </div>
    @endsection
