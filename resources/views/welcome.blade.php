<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- tailwind -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    {{-- alpinejs --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        
    </script>

    <!-- flowbite -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="./dist/output.css"> --}}
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    
    @yield('konten')

    <!-- flowbite -->
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>

</html>
