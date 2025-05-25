<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Pekara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Sidebar stilovi */
        #sidebar {
            min-width: 200px;
            max-width: 250px;
            background: #f8f9fa;
            padding-top: 1rem;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
        }

        #sidebar.collapsed {
            margin-left: -250px;
        }

        #content {
            margin-left: 250px;
            transition: all 0.3s;
        }

        #content.expanded {
            margin-left: 0;
        }

        /* Mobile prilagođavanje */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
                position: fixed;
                z-index: 1030;
            }

            #sidebar.show {
                margin-left: 0;
            }

            #content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar sa logo i toggle dugmetom -->

    <nav class="navbar navbar-expand-lg navbar-light  fixed-top shadow-sm" style="background-color:rgb(230, 206, 173);">
        <div class="container-fluid">
            <button class="btn btn-primary me-2 d-lg-none" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-transparent.png') }}" alt="Logo" style="height: 40px; margin-right: 10px;">
                Pekara
            </a>
        </div>
    </nav>

    <!-- Sidebar sa svim javnim linkovima -->
    <div id="sidebar" class="bg-light pt-4">
        <ul class="nav flex-column px-3">
            <li class="nav-item mb-2">
                <a href="{{ url('/') }}" class="nav-link text-dark fw-bold">Početna</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ url('proizvodi') }}" class="nav-link text-dark">Meni</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ url('kontakt') }}" class="nav-link text-dark">Kontakt</a>
            </li>

            @guest
                <li class="nav-item mt-3 mb-1"><hr></li>
                <li class="nav-item mb-2">
                    <a href="{{ route('login') }}" class="nav-link text-dark">Prijava</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item mb-2">
                        <a href="{{ route('register') }}" class="nav-link text-dark">Registracija</a>
                    </li>
                @endif
            @else
                <li class="nav-item mt-3 mb-1"><hr></li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item mb-2">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link text-dark p-0">Odjava</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>

    <!-- Glavni sadržaj -->
    <main id="content" class="pt-5" style="min-height: 100vh;">
        <div class="container pt-4">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4 bg-light mt-4">
        <p class="mb-0">&copy; {{ date('Y') }} Pekara. Sva prava zadržana.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // Toggle sidebar na mobilnim uređajima
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        });
    </script>

    @yield('scripts')
</body>

</html>
