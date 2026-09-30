<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Negeri 4 Bogor')</title>
    <link rel="icon" type="image/png" href="/images/logo-smk4.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-800">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>