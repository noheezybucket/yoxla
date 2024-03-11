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
                <div class="">
                    <table class="table">

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
