<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ (isset($title)) }} - OKELIST</title> --}}
        <title>{{ $title }} - OKELIST</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            {{-- Navigation-menu --}}
            @if (isset($navi))
                @livewire('navigation-menu')
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="font-semibold text-xl text-gray-800 leading-tight">
                            <div class="header">
                                {{ $header }}
                            </div>
                        </div>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @if (isset($top))
                    <div class="container">
                        <div class="top">
                            {{ $top }}
                        </div>

                        <div class="sub-container">
                            @if (isset($middle))
                                <div class="middle">
                                    {{ $middle }}
                                </div>
                            @endif

                            @if (isset($under))
                                {{ $under }}
                            @endif
                        </div>
                    </div>
                @endif
            </main>

                @if (isset($slot))
                    {{ $slot }}
                @endif

        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
