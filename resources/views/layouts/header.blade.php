<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-transparent" style="background-color: #146368" id="menu-atas">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('LogoPoso.png') }}" id="logoPoso"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mx-auto mb-2 mb-md-0"> <!-- class mx-auto untuk center align menu -->
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ide-liburan') }}">Ide Liburan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/info-umum')}}" tabindex="-1" aria-disabled="true">Informasi Umum</a>
                    </li>
                    {{-- Search Icon --}}
                    <li class="nav-item d-flex">
                        <form action="{{url('/pencarian')}}" method="get" class="search-box">
                            @csrf
                            <input type="text" name="navSearchValue"/>
                            <span></span>
                        </form>
                            
                    </li>
                    {{-- Search Icon --}}
                </ul>

            </div>
        </div>
    </nav>
</header>