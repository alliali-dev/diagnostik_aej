<!-- BEGIN: Header-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                    </ul>
                </div>
                <ul class="nav navbar-nav ">
                    @if (Route::has('login'))
                        @auth
                            @if(auth()->user()->hasRole('Super Admin'))
                                {{--<div class="col float-right">
                                    <div class="form-group">
                                        <label for="name"><span class="custom-control-indicator" style="font-size: 14px;">Année Acedemic</span></label>
                                        --}}{{--{{ Form::select('active', list_academic(),null, ['id' => 'academic','class'=>'form-control', 'required' => 'required']) }}--}}{{--
                                    --}}{{--    {{ Form::select('active', list_academic() != null ? list_academic() : null,null, ['id' => 'academic','class'=>'form-control', 'required'=>true ]) }}--}}{{--
                                    </div>
                                </div>--}}
                            @endif
                                {{--Start Horloge --}}
                                {{--<div class="col float-right">
                                    <div class="clock clk-marker">
                                        <span>
                                            <svg width="300" height="400" viewBox="0 0 300 400">
                                                <text class="th" x="150" y="200">8</text>
                                            </svg>
                                            <svg width="300" height="400" viewBox="0 0 300 400">
                                                <text class="uh" x="150" y="200">8</text>
                                            </svg>
                                        </span>
                                        :
                                        <span>
                                            <svg width="300" height="400" viewBox="0 0 300 400">
                                                <text class="tmn" x="150" y="200">8</text>
                                            </svg>
                                            <svg width="300" height="400" viewBox="0 0 300 400">
                                                <text class="umn" x="150" y="200">8</text>
                                            </svg>
                                        </span>
                                        :
                                        <span>
                                            <svg width="300" height="400" viewBox="0 0 300 400">
                                                <text class="ts" x="150" y="200">8</text>
                                            </svg>
                                            <svg width="300" height="400" viewBox="0 0 300 400">
                                                <text class="us" x="150" y="200">8</text>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="full-clock clk-marker">00:00:00</div>
                                </div>--}}
                                {{--End Horloge --}}

                            <li class="dropdown dropdown-user nav-item float-right">
                                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none" style="font-size: 14px;">
                                        <span class="user-name text-bold-600">{{ Auth::user()->name }}</span>
                                        <span class="user-status">Agence: {{ Auth::user()->agence->name }}</span>
                                    </div>
                                    <span>
                                <img class="round" src="{{ asset('app-assets/images/logo/logo_aej.png') }}"
                                     alt="avatar" height="40" width="40"/>
                                        {{--<img src="{{ asset('app-assets/images/portrait/small/avatar-s-11.png') }}" alt="branding logo" width="100%">--}}
                            </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  {{--  <a class="dropdown-item" href="#">
                                        <i class="feather icon-user"></i> Mon Compte
                                    </a>--}}
                                    @if(auth()->user()->hasRole('Super Admin'))
                                        <a class="dropdown-item" href="{{route('users.index')}}">
                                            <i class="feather icon-user-plus"></i> Gérer Utilisateur
                                        </a>
                                        <a class="dropdown-item" href="{{ route('roles.index') }}">
                                            <i class="feather icon-shield"></i> Gérer Roles
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.agenceindex') }}">
                                            <i class="feather icon-activity"></i> Gérer Agences
                                        </a>
                                    @elseif(auth()->user()->hasRole('Chef Agence') )
                                        <a class="dropdown-item" href="{{route('users.index')}}">
                                            <i class="feather icon-user-plus"></i> Gérer Utilisateur
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('users.profile') }}">
                                        <i class="feather icon-user-plus"></i> Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon icon-login-page icon-fw mr-2 mr-sm-1"></i>{{ __('Déconnexion') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    {{--  <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i>{{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>--}}
                                </div>
                            </li>

                        @else
                            <li class="nav-item d-none d-lg-block">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item d-none d-lg-block">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif

                </ul>
            </div>
        </div>
    </div>
</nav>
@section('js')
    <script>
    </script>
@endsection
<!-- END: Header-->

