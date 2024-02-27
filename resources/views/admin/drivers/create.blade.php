@extends('base')
@section('title', 'Nouveau chauffeur')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="flex flex-col gap-5  w-full h-[80vh] overflow-y-scroll">
                <div class="w-3/4 mx-auto p-2 space-y-3">
                    <div class="flex justify-between">

                        <a wire:navigate.hover href="{{ route('admin.drivers') }}"
                            class="font-bold text-xl flex items-center">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                            <span>Ajouter un chauffeur</span>
                        </a>
                    </div>

                    <form action="{{ route('admin.create-driver-treatment') }}" method="POST" class=" space-y-5">
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
                                    <label for="fullname" class="form-label">Nom complet</label>
                                    <input type="text" id="fullname" name="fullname" class="form-input">
                                </div>
                                <div class="form-div w-full">
                                    <label for="phonenumber" class="form-label">N° Téléphone</label>
                                    <input type="text" id="phonenumber" name="phonenumber" class="form-input">
                                </div>
                            </div>

                            <div class="form-div-row">
                                <div class="form-div w-full">
                                    <label for="license_number" class="form-label">N° Permis</label>
                                    <input type="number" id="license_number" name="license_number" class="form-input">
                                </div>
                                <div class="form-div w-full">
                                    <label for="years_of_xp" class="form-label">Années d'expérience</label>
                                    <input type="number" id="years_of_xp" name="years_of_xp" class="form-input">
                                </div>
                            </div>

                            <div class="form-div w-full">
                                <label for="license_category" class="form-label">Catégorie du permis</label>

                                <select name="license_category" id="license_category" class="form-input">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>

                            <div>
                                {{-- date --}}
                                <div class="form-div-row">

                                    <div class="form-div w-full">
                                        <label for="license_emission_date" class="form-label">Date d'émission du
                                            permis</label>
                                        <input type="date" id="license_emission_date" name="license_emission_date"
                                            class="form-input">
                                    </div>
                                    <div class="form-div w-full">
                                        <label for="license_expiration_date" class="form-label">Date d'expiration du
                                            permis</label>
                                        <input type="date" id="license_expiration_date" name="license_expiration_date"
                                            class="form-input">
                                    </div>
                                </div>

                                <div class="form-div w-full">
                                    <label for="photos" class="form-label">URL Photo</label>
                                    <input type="text" id="photos" name="photos" class="form-input">
                                </div>

                            </div>
                        </fieldset>

                        <button type="submit" class="btn-primary">Enregistrer <x-fas-plus class="icon" /></button>

                    </form>
                </div>
            </div>

        </div>
    @endsection
