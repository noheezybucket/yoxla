@extends('base')
@section('title', 'Accueil')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="w-full space-y-5 overflow-y-auto">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">Dashboard</h1>
                </div>
                <div class="h-[70vh] flex justify-between gap-5">
                    <div class="w-4/12">
                        <div class="grid grid-cols-2 grid-rows-3 gap-5 h-full">
                            <div class="text-center flex flex-col bg-third text-white rounded-2xl justify-center">
                                <span class="text-6xl font-bold">{{ count($drivers) }}</span>
                                <span class="text-xl">Chauffeurs</span>
                            </div>
                            <div class="text-center flex flex-col bg-third text-white rounded-2xl justify-center">
                                <span class="text-6xl font-bold">{{ count($rentals) }}</span>
                                <span class="text-xl">Locations</span>
                            </div>
                            <div class="text-center flex flex-col bg-third text-white rounded-2xl justify-center">
                                <span class="text-6xl font-bold">{{ count($clients) }}</span>
                                <span class="text-xl">Clients</span>
                            </div>
                            <div class="text-center flex flex-col bg-third text-white rounded-2xl justify-center">
                                <span class="text-6xl font-bold">{{ count($vehicles) }}</span>
                                <span class="text-xl">Voitures</span>
                            </div>
                            <div class="text-center flex flex-col bg-third text-white rounded-2xl justify-center">
                                <span class="text-6xl font-bold">450K</span>
                                <span class="text-xl">Salaires (FCFA)</span>
                            </div>
                            <div class="text-center flex flex-col bg-third text-white rounded-2xl justify-center">
                                <span class="text-6xl font-bold">2M</span>
                                <span class="text-xl">C.A (FCFA)</span>
                            </div>

                        </div>

                    </div>
                    <div class="border w-8/12 grid grid-cols-1 grid-rows-2 ">
                        <div>{!! $chart->container() !!}</div>
                        <div>{!! $chart2->container() !!}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! $chart->script() !!}
    {!! $chart2->script() !!}
@endsection
