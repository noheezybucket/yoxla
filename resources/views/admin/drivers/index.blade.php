@extends('base')
@section('title', 'Chauffeurs')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="w-full h-[80vh] space-y-3">

                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">Chauffeurs</h1>
                    <a wire:navigate.hover href="{{ route('admin.create-driver') }}" class="btn-secondary">Ajouter un
                        chauffeur <x-fas-plus class="icon mr-0" /></a>
                </div>
                <div class="grid grid-cols-3 gap-3 overflow-scroll h-full pr-4 py-5">
                    @foreach ($drivers as $driver)
                        <div class="border bg-second flex justify-center rounded-2xl gap-5 p-4 h-fit">
                            <div class="max-w-[100px]">
                                @if ($driver->avatar)
                                    <img src="{{ $driver->avatar }}" alt="">
                                @else
                                    <svg class="w-20 h-20 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.3-.6-1-1-1.6-1H7.6c-.7 0-1.3.4-1.6 1M4 5h16c.6 0 1 .4 1 1v12c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="space-y-2">
                                <h2 class="font-bold text-3xl">{{ explode(' ', $driver->fullname)[0] }} <span
                                        class="font-normal">{{ explode(' ', $driver->fullname)[1] }}</span></h2>
                                <h3>{{ $driver->years_of_xp }} années d'experience</h3>
                                <h3>Catégorie de permis : <span class="font-normal">{{ $driver->license_category }}</span>
                                </h3>
                                @include('components.label-status-driver')
                                <div class="flex gap-1">
                                    <span class="avg"></span>
                                    <span class="avg"></span>
                                    <span class="avg"></span>
                                    <span class="avg-no"></span>
                                    <span class="avg-no"></span>
                                </div>
                                <div></div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
@endsection
