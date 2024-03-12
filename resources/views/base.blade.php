<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yoxlā | @yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://paytech.sn/cdn/paytech.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://paytech.sn/cdn/paytech.min.js"></script>
</head>

<body class="overflow-hidden">
    @yield('content')
    <livewire:yoxla />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

</body>

</html>
