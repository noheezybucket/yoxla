@extends('base')
@section('title', 'Accueil')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div>Page Content Here</div>
        </div>

    </div>
@endsection
