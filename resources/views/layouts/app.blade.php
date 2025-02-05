@props(['mainClass' => '', 'bodyClass' => '', 'headerClass' => '','page_title' => ' '])
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>USeP E-Votar {{ $page_title }}</title>

    <link rel="shortcut icon" href="{{ asset('storage/assets/icon/evotar_v_logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify/dist/simple-notify.css"/>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify/dist/simple-notify.min.js"></script>


    <link href="https://unpkg.com/@pqina/flip/dist/flip.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-barlow antialiased bg-[#F7F7F9]">

@if(session('showSplash'))
    <div id="splash-screen" class="splash-screen">
        <div class="splash-screen">
            <h1 class="splash-text">
                <span class="letter">E</span>
                <span class="letter">-</span>
                <span class="letter"><svg width="160" height="160" viewBox="0 0 180 67" fill="none"
                                          xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6.97674 21.7267H8.37209L10.0465 22.2069L12.2791 23.6476L16.186 27.1322L19.814 30.4937L22.8837 34.3354L26.5116 39.1376L29.3023 44.1799L31.814 37.937L34.6046 32.1745L37.6744 26.4119L41.5814 21.1295L46.0465 16.0872L51.3488 11.7653L55.814 8.88399L60.5581 6.24281L65.8605 4.08183L72.5581 2.16097L75.907 1.44065L79.5349 0.960432L83.1628 0.480216L86.7907 0.240108L90.4186 0H94.3256H101.581L109.116 0.720324L116.372 1.44065L131.721 3.60162L165.767 9.84442L173.581 11.045L180 12.405L178.884 12.6451H178.047H177.209L176.093 12.8852L172.744 12.9658L165.767 12.7257L158.791 12.2455L147.907 11.2851C147.907 11.2851 141.613 10.5612 137.581 10.0845C130.639 9.26373 119.811 7.92356 119.811 7.92356C119.811 7.92356 114.213 7.14847 110.602 6.96313C107.084 6.78257 105.104 6.96313 101.581 6.96313C98.0939 6.96313 92.6512 6.96313 92.6512 6.96313L84 7.92356L75.3488 9.84442L71.4419 11.2851L67.5349 12.9658L63.907 14.8867L60.2791 17.2878L56.9302 19.929L53.8605 22.8103L49.1163 28.813L46.8837 32.1745L45.4884 35.2959L44.3721 37.4568L43.2558 39.6178L41.5814 44.1799L38.7907 53.5441L37.3953 61.387L36.8372 63.0677L35.7209 64.589L34.974 65.4688L34.1368 65.949L33.2996 66.4292L32.093 66.75H30.6977L29.3023 66.5099L28.4651 66.2698L27.6279 65.7896L27.0698 65.5495L26.5116 65.0692L25.9535 64.589L25.3953 64.1088L20.3721 54.5046L17.8605 49.7024L15.0698 45.0172L11.4419 40.5783L7.25581 36.2564L3.90698 33.492L2.23256 32.0514L1.39535 31.331L0.837209 30.3706L0.55814 29.8904L0.27907 29.1701L0 27.4893L0.55814 25.3283L1.95349 23.6476L3.62791 22.447L5.30233 21.9668L6.97674 21.7267Z"
                    stroke="#F50000" stroke-width="2" fill="#F50000"/>
            </svg></span>
                <span class="letter">O</span>
                <span class="letter">T</span>
                <span class="letter">A</span>
                <span class="letter">R</span>

            </h1>
        </div>
    </div>

@endif

<div class="min-h-screen max-w-screen-2xl mx-auto bg-[#F7F7F9] {{ $mainClass }}">
    @if (isset($sidebar))
        <sidebar class="h-screen w-[300px]  flex flex-col shadow z-10 sticky">
            {{ $sidebar }}
        </sidebar>
    @endif
    <div class="h-screen w-full flex flex-col {{ $bodyClass }}" x-data>
        <div
            x-on:election-created.window="pushNotification('success', 'Election Created', 'Election has been created successfully.');"></div>
        <div
            x-on:election-deleted.window="pushNotification('success', 'Election Deleted', 'Election has been deleted successfully.');"></div>
        <div
            x-on:election-updated.window="pushNotification('success', 'Election Updated', 'Election has been updated successfully.');"></div>
        <div
            x-on:candidate-created.window="pushNotification('success', 'Candidate Created', 'Candidate has been created successfully.');"></div>
        <div
            x-on:user-deleted.window="pushNotification('success', 'System User Deleted', 'User has been delete successfully.');"></div>
        <div
            x-on:user-created.window="pushNotification('success', 'System User Added', 'User has been added successfully.');"></div>
        <div
            x-on:position-created.window="pushNotification('success', 'Position Added', 'Position has been added successfully.');"></div>
        <div
            x-on:position-updated.window="pushNotification('success', 'Position Updated', 'Position has been updated successfully.');"></div>
        <div
            x-on:position-deleted.window="pushNotification('success', 'Position Deleted', 'Position has been deleted successfully.');"></div>
        <div
            x-on:voter-updated.window="pushNotification('success', 'Voter Updated', 'Voter has been updated successfully.');"></div>
        <div
            x-on:voter-deleted.window="pushNotification('success', 'Voter Deleted', 'Voter has been deleted successfully.');"></div>
        <div
            x-on:system-user-created.window="pushNotification('success', 'System User Added', 'User has been added successfully.');"></div>
        <div
            x-on:system-user-updated.window="pushNotification('success', 'System User Updated', 'User has been updated successfully.');"></div>
        <div
            x-on:system-user-deleted.window="pushNotification('success', 'System User Deleted', 'User has been deleted successfully.');"></div>
        <div
            x-on:party-list-created.window="pushNotification('success', 'Party List Added', 'Party List has been added successfully.');"></div>
        <div
            x-on:party-list-updated.window="pushNotification('success', 'Party List Updated', 'Party List has been updated successfully.');"></div>
        <div
            x-on:party-list-deleted.window="pushNotification('success', 'Party List Deleted', 'Party List has been deleted successfully.');"></div>



        <!-- Page Heading -->

        @if (isset($main))
            <!-- Page Content -->
            <main class="relative flex-1 max-lg:h-dvh lg:overflow-y-auto  w-full">
                <div class="sticky">
                    @if (isset($header))
                        <header class="flex pt-2 w-full {{ $headerClass }} z-20">
                            <div class=" py-2 w-full justify-between items-center flex">
                                {{ $header }}
                            </div>
                        </header>
                    @endif
                </div>
                {{ $main }}
                <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
                <script
                    src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
            </main>
        @endif

    </div>
</div>

{{ $slot }}


@stack('modals')
@livewireScripts
@if(session('script'))
    {!! session('script') !!}
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/@pqina/flip/dist/flip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/face-api.js"></script>

<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            const splashScreen = document.getElementById('splash-screen');
            if (splashScreen) {
                splashScreen.style.display = 'none';
            }
        }, 2000);
    });
</script>


</body>

</html>
