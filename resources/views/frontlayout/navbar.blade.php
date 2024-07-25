<header>
    <!-- <div class="text-center py-3" style="background: linear-gradient(to right, #A2009A, #FFB7FC, #A2009A)" ;>
        <div class="container">
            <div class="row gx-5 justify-content-center">
                <div class="col-sm-12">
                    <img src="{{asset('logos')}}/logo-pemkot.png" alt="Logo Sanki" style="height: 2rem" class="px-1" />
                    <img src="{{asset('logos')}}/kominfo.png" alt="Logo Sanki" style="height: 2rem" class="px-1" />
                    <img src="{{asset('logos')}}/Logo_BSSN_new.png" alt="Logo Sanki" style="height: 2rem" class="px-1" />
                </div>
            </div>
        </div>
    </div> -->
    <!-- Image and text -->
    
    <nav class="py-2" style="background-image: url({{asset('logos')}}/nap.png);">
        <div class="d-flex justify-content-center">
            <div class="nav col-sm-4 justify-content-center align-content-center">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('logos')}}/logo_alter2.png" width="200" height="45" class="d-inline-block align-top" alt="">
                </a>
            </div>
            <div class="col-sm-4" style="align-items:center">
                <ul class="nav justify-content-center align-middle py-2">
                    <li><a href="profil" class="px-2 text-dark" style="text-decoration:none"><b>PROFIL</b></a></li>
                    <li><a href="{{route('sop')}}" class="px-2 text-dark" style="text-decoration:none"><b>SOP</b></a></li>
                    <li><a href="kontak" class="px-2 text-dark" style="text-decoration:none"><b>KONTAK</b></a></li>
                    <li><a href="faq" class="px-2 text-dark" style="text-decoration:none"><b>FAQ</b></a></li>
                    <li><a href="survey" class="px-2 text-dark" style="text-decoration:none"><b>SURVEY</b></a></li>
                    <li><a href="https://csirt.kedirikota.go.id/" target="_blank" class="px-2 text-dark" style="text-decoration:none"><b>CSIRT</b></a></li>
                </ul>
            </div>
            <div class="nav col-sm-4 justify-content-center" style="display:flex; align-items:center">
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('login') }}"><img src="{{asset('logos')}}/angle-right.png" width="15" height="15" class="mr-2" alt="" style="margin-bottom: 3px;">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('register') }}"><img src="{{asset('logos')}}/add.png" width="15" height="15" class="mr-2" alt="" style="margin-bottom: 3px;">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle  text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{asset('logos')}}/user.png" width="15" height="15" class="mr-2" alt="" style="margin-bottom: 3px;">{{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="{{asset('logos')}}/portrait.png" width="15" height="15" class="mr-2" alt="" style="margin-bottom: 3px;">{{ __('Profil Pemohon') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="{{asset('logos')}}/rocket-lunch.png" width="15" height="15" class="mr-2" alt="" style="margin-bottom: 3px;">{{ __('Tracking Permohonan') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <img src="{{asset('logos')}}/angle-left.png" width="15" height="15" class="mr-2" alt="" style="margin-bottom: 3px;">{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </div>
        </div>
    </nav>
    <!-- <div class="py-1" style="background-color: #A2009A;"></div> -->
</header>