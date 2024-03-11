@extends('base')
@section('title', 'Modifier chauffeur')

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
                            <span>Modifier un chauffeur</span>
                        </a>
                    </div>

                    <form action="{{ route('admin.update-driver-treatment', ['id' => $driver->id]) }}" method="POST"
                        class=" space-y-5">
                        @if (session('status'))
                            <div class="success">{{ session('status') }}</div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <div class="error">{{ $error }}</div>
                        @endforeach
                        @csrf
                        @method('PUT')

                        {{-- basic car info --}}
                        <fieldset class="field">
                            <legend class="field-legend">Informations générales</legend>
                            <div class="form-div-row">
                                <div class="form-div w-full">
                                    <label for="fullname" class="form-label">Nom complet</label>
                                    <input type="text" id="fullname" name="fullname" class="form-input"
                                        value="{{ $driver->fullname }}">
                                </div>
                                <div class="form-div w-full">
                                    <label for="phonenumber" class="form-label">N° Téléphone</label>
                                    <input type="text" id="phonenumber" name="phonenumber" class="form-input"
                                        value="{{ $driver->phonenumber }}">
                                </div>
                            </div>

                            <div class="form-div-row">
                                <div class="form-div w-full">
                                    <label for="license_number" class="form-label">N° Permis</label>
                                    <input type="number" id="license_number" name="license_number" class="form-input"
                                        value="{{ $driver->license_number }}">
                                </div>
                                <div class="form-div w-full">
                                    <label for="years_of_xp" class="form-label">Années d'expérience</label>
                                    <input type="number" id="years_of_xp" name="years_of_xp" class="form-input"
                                        value="{{ $driver->years_of_xp }}">
                                </div>
                            </div>

                            <div class="form-div-row">

                                <div class="form-div w-full">
                                    <label for="license_category" class="form-label">Catégorie du permis</label>

                                    <select name="license_category" id="license_category" class="form-input">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                                <div class="form-div w-full">
                                    <label for="salary" class="form-label">Salaire</label>
                                    <input type="number" id="salary" name="salary" class="form-input"
                                        value="{{ $driver->salary }}">
                                </div>
                            </div>

                            <div>
                                {{-- date --}}
                                <div class="form-div-row">

                                    <div class="form-div w-full">
                                        <label for="license_emission_date" class="form-label">Date d'émission du
                                            permis</label>
                                        <input type="date" id="license_emission_date" name="license_emission_date"
                                            class="form-input" value="{{ $driver->license_emission_date }}">
                                    </div>
                                    <div class="form-div w-full">
                                        <label for="license_expiration_date" class="form-label">Date d'expiration du
                                            permis</label>
                                        <input type="date" id="license_expiration_date" name="license_expiration_date"
                                            class="form-input" value="{{ $driver->license_expiration_date }}">
                                    </div>
                                </div>

                                <div class="form-div w-full">
                                    <label for="avatar" class="form-label">URL Photo</label>
                                    <input type="text" id="avatar" name="avatar" class="form-input"
                                        value="{{ $driver->avatar }}">
                                </div>

                            </div>
                        </fieldset>

                        <button type="submit" class="btn-primary">Enregistrer
                            <svg class="icon " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 11v5m0 0 2-2m-2 2-2-2M3 6v1c0 .6.4 1 1 1h16c.6 0 1-.4 1-1V6c0-.6-.4-1-1-1H4a1 1 0 0 0-1 1Zm2 2v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V8H5Z" />
                            </svg>
                        </button>

                    </form>
                </div>
            </div>

        </div>
    @endsection
