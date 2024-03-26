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
                    <h1 class="font-bold text-2xl">Mes courses</h1>
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
                                    Nom du chauffeur
                                </th>
                                <th class="px-6 py-2 ">
                                    N°Téléphone du chauffeur
                                </th>
                                <th class="px-6 py-2 ">
                                    Date/Heure de début
                                </th>
                                <th class="px-6 py-2 ">
                                    Date/Heure de fin
                                </th>
                                <th class="px-6 py-2 ">
                                    Tarif
                                </th>
                                <th class="px-6 py-2 ">
                                    Statut
                                </th>

                                <th class="px-6 py-2 ">
                                    Notes
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
                                        {{ $rental->vehicle->driver->fullname }}

                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $rental->vehicle->driver->phonenumber }}

                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $rental->starting_date }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $rental->ending_date }}
                                    </td>
                                    <td>
                                        <?php
                                        $date1 = new DateTime($rental->starting_date);
                                        $date2 = new DateTime($rental->ending_date);
                                        $difference = $date1->diff($date2)->days;
                                        echo $difference * $rental->vehicle->daily_price . ' XOF';
                                        ?>

                                    </td>
                                    <td class="px-6 py-4 ">
                                        @if ($rental->status === 'pending')
                                            <span class="bg-red-600 text-white p-3 rounded-2xl w-full">Non Payé</span>
                                        @else
                                            <span class="bg-green-600 text-white p-3 rounded-2xl w-full">Payé</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 space-x-2 flex items-center justify-center h-full">
                                        @if ($rental->status !== 'pending' && $rental->vehicle->driver->avg_rating === 0)
                                            <form
                                                action="{{ route('client.rate-driver-treatment', ['id' => $rental->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="range" max="5" min="1" name="rate">
                                                {{-- <select name="rate">
                                                    <option value="1">1/5</option>
                                                    <option value="2">2/5</option>
                                                    <option value="3">3/5</option>
                                                    <option value="4">4/5</option>
                                                    <option value="5">5/5</option>
                                                </select> --}}
                                                <button type="submit"
                                                    class="p-3 text-green-600 bg-green-200 rounded-xl flex justify-center">
                                                    Soumettre la note
                                                </button>
                                            </form>
                                        @elseif($rental->vehicle->driver->avg_rating !== 0)
                                            <span>{{ $rental->vehicle->driver->avg_rating }}</span>
                                        @else
                                            <span>-</span>
                                        @endif

                                        {{-- <button class="buy" onclick="buy(this)"
                                            data-id-transaction="{{ $rental->id }}">Payer</button> --}}
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

{{-- <script>
    function buy(btn) {
        var idTransaction = pQuery(btn).attr('data-id-transaction');
        (new PayTech({
            idTransaction: idTransaction,
        })).withOption({
            requestTokenUrl: 'http://127.0.0.1:8000/client/dashboard',
            method: 'POST',
            headers: {},
            prensentationMode: PayTech.OPEN_IN_POPUP,
            didReceiveError: function(error) {
                console.log(error);
            },
            didReceiveNonSuccessResponse: function(jsonResponse) {
                console.log(jsonResponse);
            }
        }).send();
        //.send params are optional
    }
</script> --}}
