@extends('base')
@section('title', 'Accueil')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="w-full space-y-5 overflow-y-auto">
                <div class="shadow-lg border rounded-2xl p-4 font-bold">Bienvenue sur votre dashboard, client</div>

                <div class="">
                    <table class="table">

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
