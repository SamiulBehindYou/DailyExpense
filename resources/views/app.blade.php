<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: oklch(1 0 0);
            }

            html.dark {
                background-color: oklch(0.145 0 0);
            }
        </style>

        <title inertia>{{ config('app.name', 'DalyExpanse') }}</title>

            <!-- Favicon -->
            <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon/favicon.ico" />

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet" />

            <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/iconify-icons.css" />

            <!-- Core CSS -->
            <!-- build:css assets/vendor/css/theme.css  -->

            <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/core.css" />
            <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css" />

            <!-- Vendors CSS -->

            <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

            <!-- endbuild -->

            <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/apex-charts/apex-charts.css" />

            <!-- Page CSS -->

            <!-- Helpers -->
            <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>
            <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

            <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

            <script src="{{ asset('assets') }}/js/config.js"></script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @routes
        @vite(['resources/js/app.ts'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia


            <!-- Core JS -->

            <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>

            <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
            <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>

            <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

            <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>

            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ asset('assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

            <!-- Main JS -->

            <script src="{{ asset('assets') }}/js/main.js"></script>

            <!-- Page JS -->
            <script src="{{ asset('assets') }}/js/dashboards-analytics.js"></script>

            <!-- Place this tag before closing body tag for github widget button. -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>


            
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Initialize all tooltips
                    $('html').removeClass('dark');
                });
            </script>
    </body>
</html>
