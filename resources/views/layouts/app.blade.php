<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Daser.Im') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @stack('styles')

    <style>
        body::-webkit-scrollbar {
            width: 5px;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #1c2260;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        body::-webkit-scrollbar-thumb:hover {
            background-color: #5f64f4;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="page-top">
    <div id="wrapper">

        @if (!request()->routeIs('service*'))
            @include('layouts.sidebar')
        @endif

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.nav')
                <!-- End of Topbar -->
                <div class="div" style="margin-left:30px; margin-right:30px">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Orion 2023</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    @if (config('app.notification_sound'))
        <audio id="audiotNotifSuccess" controls autoplay style="display: none">
            <source src="{{ asset('audio/success.ogg') }}" type="audio/ogg">
            <source src="{{ asset('audio/success.mp3') }}" type="audio/mpeg">
        </audio>
        <audio id="audiotNotifError" controls autoplay style="display: none">
            <source src="{{ asset('audio/error.ogg') }}" type="audio/ogg">
            <source src="{{ asset('audio/error.mp3') }}" type="audio/mpeg">
        </audio>
    @endif

    @stack('modal')
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}').onShown.subscribe(function() {
                playAudio('audiotNotifSuccess');
            });
        </script>
    @elseif (session('error'))
        <script>
            toastr.error('{{ session('error') }}').onShown.subscribe(function() {
                playAudio('audiotNotifError');
            });
        </script>
    @endif
    <script>
        function playAudio(audioId) {
            var audio = document.getElementById(audioId);
            audio.play();
        }
    </script>
    @stack('scripts')
</body>

</html>
