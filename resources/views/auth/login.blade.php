@extends('auth')
@section('title', 'Connexion')

@section('auth-img')
    <img src="{{ asset('assets/car.jpg') }}" class="w-full h-[100%]  object-cover rounded-2xl" alt="Vote">
@endsection

@section('auth-form')
    <form id="login-form" class="p-3" style="max-width: 500px; width:100%">
        <div class="flex items-center justify-center">
            {{-- <x-fas-map-pin class="icon" /> --}}
            <h1 class="text-center text-2xl font-bold text-third">yoxlā</h1>

        </div>
        <hr class="my-2 w-1/2 mx-auto">

        <h2 class="text-3xl text-center">Connexion</h2>
        <div class="my-2">
            <p><span id="error" class="text-danger"></span></p>
        </div>
        @csrf
        <div class="form-div">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-input">
        </div>
        <div class="form-div">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input">
            <a href="" class="link">Mot de passe
                oublié?</a>
        </div>
        <div class=" mb-4">
            <button type="button" class="btn-primary" id="login-btn">Se connecter
                <x-fas-arrow-right-to-bracket class="icon" />

            </button>
        </div>


        <div>
            <p class="mt-2">Vous n'avez pas de compte?
                <a href="{{ route('auth.register') }}" class="link">Inscrivez-vous facilement ici</a>
            </p>
        </div>
    </form>
@endsection
