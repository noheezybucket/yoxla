@extends('base')
@section('title', 'Location')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')

            <div class="w-full h-[70vh] space-y-10">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">Locations</h1>
                    <a wire:navigate.hover href="{{ route('admin.create-rental') }}" class="btn-secondary">Créer une
                        location <x-fas-plus class="icon mr-0" /></a>
                </div>
                <div>
                    <div class="w-full flex justify-center overflow-auto">
                        <div class="flex flex-col border w-full">
                            <div class="w-full">
                                <div class="border-b border-gray-200 shadow w-full">
                                    <table class="divide-y divide-gray-300 w-full">
                                        <thead class="bg-second text-left">
                                            <tr>
                                                <th class="px-6 py-2 ">
                                                    ID
                                                </th>
                                                <th class="px-6 py-2 ">
                                                    Nom du client
                                                </th>
                                                <th class="px-6 py-2 ">
                                                    N°Téléphone du client
                                                </th>
                                                <th class="px-6 py-2 ">
                                                    Date/Heure de début
                                                </th>
                                                <th class="px-6 py-2 ">
                                                    Date/Heure de fin
                                                </th>

                                                <th class="px-6 py-2 ">
                                                    Actions
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">
                                            @foreach ($rentals as $rental)
                                                <tr class="whitespace-nowrap">
                                                    <td class="px-6 py-4 text-sm ">
                                                        {{ $rental->id }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $rental->client_fullname }}

                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $rental->client_phonenumber }}

                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        {{ $rental->starting_date }}
                                                    </td>
                                                    <td class="px-6 py-4 ">
                                                        {{ $rental->ending_date }}
                                                    </td>

                                                    <td class="px-6 py-4 space-x-2 flex">
                                                        <a href="{{ route('admin.show-rental', ['id' => $rental->id]) }}"
                                                            class="p-3 text-second bg-third rounded-xl  flex justify-center">
                                                            <svg class="w-6 h-6 inline-block dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z" />
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('admin.update-rental', ['id' => $rental->id]) }}"
                                                            class="p-3 text-yellow-600 bg-yellow-200 rounded-xl flex justify-center">
                                                            <svg class="w-6 h-6 inline-block dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m10.8 17.8-6.4 2.1 2.1-6.4m4.3 4.3L19 9a3 3 0 0 0-4-4l-8.4 8.6m4.3 4.3-4.3-4.3m2.1 2.1L15 9.1m-2.1-2 4.2 4.2" />
                                                            </svg>
                                                        </a>
                                                        </a>
                                                        <a href="{{ route('admin.show-rental', ['id' => $rental->id]) }}"
                                                            class="p-3 text-red-400 bg-red-200 rounded-xl flex justify-center">
                                                            <svg class="w-6 h-6 inline-block dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                            </svg>
                                                        </a>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
