@extends('base')
@section('title', 'Nouvelle location')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex flex-col gap-5  w-full h-[80vh] overflow-y-scroll">
                <div class="w-3/4 mx-auto p-2 space-y-3">
                    <div class="flex justify-between">

                        <a wire:navigate.hover href="{{ route('admin.rentals') }}"
                            class="font-bold text-xl flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                            <span>Création d'une location</span>
                        </a>
                    </div>

                    <form action="{{ route('admin.create-rental-treatment') }}" method="POST" class=" space-y-5">
                        @if (session('status'))
                            <div class="success">{{ session('status') }}</div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="error">{{ $error }}</div>
                        @endforeach
                        @csrf
                        {{-- basic car info --}}
                        <fieldset class="field">
                            <legend class="field-legend">Informations du client</legend>
                            <div class="form-div-row">
                                <div class="form-div w-full">
                                    <label for="client_fullname" class="form-label">Nom complet</label>
                                    <input type="text" id="client_fullname" name="client_fullname" class="form-input">
                                </div>
                                <div class="form-div w-full">
                                    <label for="client_phonenumber" class="form-label">N° Téléphone</label>
                                    <input type="number" id="client_phonenumber" name="client_phonenumber"
                                        class="form-input">
                                </div>
                            </div>

                        </fieldset>
                        <fieldset class="field">

                            <legend class="field-legend">Informations de location</legend>

                            <div class="form-div-row">

                                <div class="form-div w-full">
                                    <label for="starting_date" class="form-label">Date et heure de début</label>
                                    <input type="datetime-local" id="starting_date" name="starting_date" class="form-input">
                                </div>
                                <div class="form-div w-full">
                                    <label for="ending_date" class="form-label">Date et heure de fin</label>
                                    <input type="datetime-local" id="ending_date" name="ending_date" class="form-input">
                                </div>
                            </div>
                            <div class="form-div w-full">
                                <label for="vehicle_id" class="form-label">Voitures disponibles</label>
                                <select name="vehicle_id" id="vehicle_id" class="form-input">
                                    <option selected>Sélectionner un véhicule à louer</option>
                                    @if (count($vehicles) > 0)
                                        @foreach ($vehicles as $vehicle)
                                            @if ($vehicle->driver !== null)
                                                <option value="{{ $vehicle->id }}">

                                                    {{ $vehicle->driver->fullname }} -
                                                    {{ $vehicle->brand }} {{ $vehicle->model }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif


                                </select>
                            </div>

                            <div class="form-div-row">
                                <div class="form-div w-full">
                                    <label for="starting_point" class="form-label">Lieu de départ</label>
                                    <input type="text" name="starting_point" id="starting_point" class="form-input" />

                                </div>
                                <div class="form-div w-full">

                                    <label for="ending_point" class="form-label">Lieu d'arrivée</label>
                                    <input type="text" name="ending_point" id="ending_point" class="form-input">

                                </div>
                            </div>
                        </fieldset>


                        <button type="submit" class="btn-primary">Enregistrer
                            <svg class="icon " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 11v5m0 0 2-2m-2 2-2-2M3 6v1c0 .6.4 1 1 1h16c.6 0 1-.4 1-1V6c0-.6-.4-1-1-1H4a1 1 0 0 0-1 1Zm2 2v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V8H5Z" />
                            </svg>
                        </button>

                    </form>
                </div>
            </div>

        </div>
    @endsection
