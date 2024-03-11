@extends('base')
@section('title', 'Statistiques')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="h-full w-full space-y-5 overflow-y-auto">
                <div class="flex justify-between items-center">
                    <h1 class="font-bold text-2xl">Statistiques</h1>
                </div>
                <div class="grid grid-cols-2 grid-rows-2">
                    <div>{!! $chart->container() !!}</div>
                    <div>{!! $chart2->container() !!}</div>

                </div>
            </div>
        </div>

    </div>
    {!! $chart->script() !!}
    {!! $chart2->script() !!}
@endsection
