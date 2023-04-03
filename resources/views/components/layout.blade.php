<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Font CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400&display=swap" rel="stylesheet">
    {{-- favicoon --}}
    <link rel="icon" type="image/png" sizes="32x32" href="\media\favicoon2.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    {{-- bandierine --}}
    <div class="container-fluid linguePc">
        <div class="row justify-content-end">
            <div class="col-12 text-end me-4"> 
                    <x-_locale lang='it'  />
                    <x-_locale lang='en' />
                    <x-_locale lang='es'  />
            </div>
        </div>
    </div>
    <x-navbar />

    <div class="min-vh-100">
        {{ $slot }}
    </div>

    <x-footer />
    <x-footerMobile />
    @livewireScripts
</body>

</html>
