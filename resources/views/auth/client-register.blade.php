@extends('auth')
@section('title', 'Inscription')

@section('auth-img')
    <img src="{{ asset('assets/rover.png') }}" class="w-full h-[100%]  object-contain rounded-2xl" alt="Vote">
@endsection

@section('auth-form')
    <form id="login-form" class="p-3" style="max-width: 500px; width:100%" action="{{ route('auth.do-client-register') }}"
        method="POST">

        <div class="flex items-center justify-center">
            {{-- <x-fas-map-pin class="icon" /> --}}
            <h1 class="text-center text-2xl font-bold text-accent1">yoxlā</h1>

        </div>
        <hr class="my-2 w-1/2 mx-auto">

        <h2 class="text-3xl text-center">Inscription</h2>
        <div class="my-2">
            <p><span id="error" class="text-danger"></span></p>
        </div>
        <div class="my-2">
            @if ($errors->any())
                <div id="error" class="text-danger">
                    <ul class="text-red-700 bg-red-300 rounded-2xl p-1 text-center">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('error-message'))
                <p class="text-red-700 bg-red-300 rounded-2xl p-1 text-center">{{ Session::get('error-message') }}</p>
            @endif
        </div>
        @csrf
        <div class="form-div">
            <label for="fullname" class="form-label">Nom complet</label>
            <input type="text" id="fullname" name="fullname" class="form-input">
        </div>
        <div class="form-div">
            <label for="phonenumber" class="form-label">N° Téléphone</label>
            <input type="number" id="phonenumber" name="phonenumber" class="form-input">
        </div>
        <div class="form-div">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-input">
        </div>
        <div class="form-div">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input">
        </div>
        <div class=" mb-4">
            <button type="submit" class="btn-primary-clt" id="login-btn">S'inscrire
                <x-fas-arrow-right-to-bracket class="icon" />

            </button>
        </div>


        <div>
            <p class="mt-2">Vous avez déjà un compte?
                <a href="{{ route('auth.client-login') }}" class="link">Connectez-vous facilement ici</a>
            </p>
        </div>
    </form>
@endsection
