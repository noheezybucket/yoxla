@extends('base')
@section('title', 'Supprimer la location')

@section('content')
    <div class="mx-10">
        @include('components.admin-header')

        <div class="flex gap-5">
            @include('components.admin-menu')
            <div class="w-full h-[80vh] flex justify-center items-center">
                <div class="w-1/2">
                    <p class="text-3xl font-bold text-center">Nous vous rappelons que cette action est
                        irréversible...Êtes-vous sûr de vouloir supprimer cette location ?</p>
                    <form action="{{ route('admin.delete-rental-treatment', ['id' => $id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="flex mt-5 gap-5">
                            <button type="submit" class="btn-delete w-full">Oui, je suis sûr</button>
                            <a wire:navigate.hover href="{{ route('admin.show-vehicle', ['id' => $id]) }}"
                                class="btn-primary ">Non,
                                j'annule</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
