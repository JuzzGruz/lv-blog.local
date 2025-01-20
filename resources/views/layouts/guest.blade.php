<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}"><!--FontAwesome-->
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free-6.7.2-web/css/all.css') }}" /><!--FontAwesome-->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
    <body class="font-sans text-black antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="Edica"></a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray dark:bg-gray-200 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
