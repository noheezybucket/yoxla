<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yoxlā | @yield('title')</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div>
        <div id="loader" class="overlay">
            <div class="spinner-border text-primary" role="status">
            </div>
        </div>
        <div class="flex flex-row-reverse">
            <div class="w-1/2 p-10 h-[100vh]">
                {{-- <div class="position-absolute top-0 w-full h-[100vh] bg-accent1 bg-opacity-5"></div> --}}
                @yield('auth-img')
            </div>
            <div class="w-1/2">
                <div class="flex items-center justify-center h-[100vh]">
                    @yield('auth-form')
                </div>
            </div>

        </div>
    </div>
    <livewire:yoxla />
</body>

</html>
