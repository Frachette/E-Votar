<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>USeP E-Votar</title>

        <link rel="shortcut icon" href="{{ asset('storage/assets/icon/evotar_v_logo.png') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        @livewire('privacy-agreement')
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased ">
            {{ $slot }}
        </div>
        @livewireScripts
        <script>
            (async () => {
                const modelPath = '{{ asset("storage/models") }}';
                try {
                    await Promise.all([
                        faceapi.nets.ssdMobilenetv1.loadFromUri(modelPath),
                        faceapi.nets.faceLandmark68Net.loadFromUri(modelPath),
                        faceapi.nets.faceRecognitionNet.loadFromUri(modelPath)
                    ]);
                    sessionStorage.setItem('faceModelsLoaded', 'true');
                } catch (error) {
                    console.error("Preloading models failed:", error);
                }
            })();
        </script>
    </body>
</html>
