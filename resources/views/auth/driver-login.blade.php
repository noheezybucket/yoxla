@extends('auth')
@section('title', 'Connexion')

@section('auth-img')
    <img src="{{ asset('assets/bmw.png') }}" class="w-full h-[100%]  object-contain rounded-2xl" alt="Vote">
@endsection

@section('auth-form')
    <div style="max-width: 500px; width:100%" class="flex flex-col">

        <div class="flex items-center justify-center">
            {{-- <x-fas-map-pin class="icon" /> --}}
            <h1 class="text-center text-2xl font-bold text-accent2">yoxlā</h1>

        </div>

        <hr class="my-2 w-1/2 mx-auto">

        <h2 class="text-3xl text-center">Dalàl ak jam</h2>

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

        <form id="login-form" action="{{ route('auth.do-driver-login') }}" method="POST">
            @csrf
            <div class="form-div">
                <label for="phonenumber" class="form-label">N° Téléphone</label>
                <input type="number" id="phonenumber" name="phonenumber" class="form-input">
            </div>
            <div class="form-div">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-input">
                <a href="" class="link text-right">Mot de passe
                    oublié?</a>
            </div>

            <div class=" mb-4">
                <button type="submit" class="btn-primary-drv" id="login-btn">Se connecter
                    <x-fas-arrow-right-to-bracket class="icon" />

                </button>
            </div>


            {{-- <div>
                <p class="mt-2">Vous n'avez pas de compte?
                    <a href="{{ route('auth.register') }}" class="link">Inscrivez-vous facilement ici</a>
                </p>
            </div> --}}
        </form>
    </div>

@endsection
