@extends('base')
@section('title', 'Accueil')

@section('content')
    <div class="mx-10">
        @include('components.client-header')

        <div class="flex gap-5">
            @include('components.client-menu')
            <div class="w-full space-y-5 overflow-y-auto">
                {{-- <div class="shadow-lg border rounded-2xl p-4 font-bold">Bienvenue sur votre dashboard, client</div> --}}
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">Mes prochaines courses</h1>
                    {{-- <a wire:navigate.hover href="{{ route('client.create-rental') }}" class="btn-secondary">Créer une
                        location <x-fas-plus class="icon mr-0" /></a> --}}
                </div>
                <div class="">
                    @if (session('status'))
                        <div class="success mb-2">{{ session('status') }}</div>
                    @endif
                    <table class="table w-full">
                        <thead class="bg-second text-left">
                            <tr class="text-center">
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
                                    Statut
                                </th>

                                <th class="px-6 py-2 ">
                                    Actions
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">

                            @foreach ($rentals as $rental)
                                <tr class="whitespace-nowrap text-center">
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
                                    <td class="px-6 py-4 ">
                                        @if ($rental->status === 'pending')
                                            <span class="bg-red-600 text-white p-3 rounded-2xl w-full">Non payé</span>
                                        @else
                                            <span class="bg-green-600 text-white p-3 rounded-2xl w-full">Payé</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 space-x-2 flex items-center justify-center h-full">
                                        @if ($rental->status === 'pending')
                                            <form action="{{ route('client.pay-rental-treatment', ['id' => $rental->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{ $rental->id }}">
                                                <button type="submit"
                                                    class="p-3 text-green-600 bg-green-200 rounded-xl flex justify-center">
                                                    Payer
                                                </button>
                                            </form>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
