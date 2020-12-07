<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">
                        AEJ-DIAG
                    </h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                       data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span></span></li>
            <li class="nav-item">
                <a href="{{route('home')}}">
                    <i class="feather icon-box"></i>
                    <span class="menu-title" data-i18n="">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item  has-sub sidebar-group-active">
                <a href="#">
                    <i class="feather icon-user-plus"></i>
                    <span class="menu-title" data-i18n="Videos">Diagnostique</span>
                </a>
                <ul class="menu-content" style="">
                    <li>
                        <a href="{{ route('diagnostik.create') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">1ere Rencontre</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('diagnostik.mes_suivies') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">Mes Suivies</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('diagnostik.index') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">liste</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('diagnostik.diagnos') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">Faire un entretien</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  has-sub sidebar-group-active">
                <a href="#">
                    <i class="feather icon-user"></i>
                    <span class="menu-title" data-i18n="Videos">Chef d'agence</span>
                </a>
                <ul class="menu-content" style="">
                    <li>
                        <a href="{{ route('chefagence.rencontre1') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">1ere Rencontre</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chefagence.rencontre2') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">2eme Rencontre</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chefagence.rencontre3') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">3eme Rencontre</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{ route('chefagence.rencontre4') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">4eme Rencontre</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chefagence.rencontre5') }}">
                            <i></i><span class="menu-item" data-i18n="Categorie create">5eme Rencontre</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
