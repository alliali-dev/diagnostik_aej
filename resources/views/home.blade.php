@extends('layouts.master')
@section('title') Tableau de Bord @endsection
@section('subTitle') Mes Données @endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}"  rel="stylesheet">
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        @if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Chef Agence'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-center pb-0">
                            <div class="row">
                                @if(auth()->user()->hasRole('Super Admin'))
                                    <div class="col-lg-12">
                                        <h4 style="text-align: center;color: #f84702;text-transform: uppercase"> PILOTAGE POUR ADMINISTRATEUR</h4>
                                    </div>
                                @else
                                    <div class="col-lg-12">
                                        <h4 style="text-align: center;color: #f84702;text-transform: uppercase"> PILOTAGE POUR LE CHEF D'AGENCE de {{ Auth::user()->agence->name }}</h4>
                                    </div>
                                @endif
                                <div class="col-lg-12" id="put_counter"><div id="counter_number" class="row" style="background: rgb(6, 169, 83);padding-top: 10px;">
                                        <!-- #counter -->
                                        <br>
                                        <div class="col-lg-12">
                                           {{-- <h4 id="hours" class="txt-align-center txt-upper" style="color: white">
                                                {{ date('Y/m/d H:i:s') }}
                                            </h4>--}}
                                            <strong>
                                                <p class="txt-upper txt-align-center " style="color: white;font-size: 20px">
                                                    Entretien effectué {{ $suivierencontres->count() }}
                                                </p>
                                            </strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 1 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="deamndeurs" class="deamndeurs"> {{$rencontres->count() }} </h4>
                                                    <p class="ttle_count">TOTAL DES SUIVIES</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <!-- .row -->
                                            <div class="info">
                                                <!-- 2 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->

                                                    <h4 id="entreprise" class="entreprise">{{$rencontres->where('typerencontre',1)->count() }}</h4>
                                                    <p class="ttle_count">1ere RENCONTRE</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',2)->count() }}</h4>
                                                    <p class="ttle_count">2eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',3)->count() }}</h4>
                                                    <p class="ttle_count">3eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',4)->count() }}</h4>
                                                    <p class="ttle_count">4eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',5)->count() }}</h4>
                                                    <p class="ttle_count">5eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <!-- .row end -->
                                        <!-- #counter area end -->
                                    </div></div>
                                <div class="col-lg-12">
                                    <br>
                                    {{--<h4 style="text-align: center;color: #f84702;text-transform: uppercase"> Donnees sur les rencontres</h4>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <p class="ttle_count themeioan_counter">MODALITE DE PRISE EN CHARGE</p>
                            <div style="background: white;width: 100%;height:100%;display: block; padding-bottom: 20px;">
                                {{ $recmodalitejs->render()  }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <p class="ttle_count themeioan_counter">PRESENCE DEMANDEUR</p>
                            <div style="background: white;width: 100%;height: 100%;display: block; padding-bottom: 20px;">
                                {!! $prdejs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <p class="ttle_count themeioan_counter">AXE DE TRAVAIL</p>
                            <div style="background: white;width: 100%;height: 100%;display: block; padding-bottom: 20px;">
                                 {!! $recaxetravailjs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->hasRole('Conseiller Emploi'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-center pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 style="text-align: center;color: #f84702;text-transform: uppercase"> PILOTAGE Conseiller Emploi {{ Auth::user()->agence->name }}</h4>
                                </div>
                                <div class="col-lg-12" id="put_counter"><div id="counter_number" class="row" style="background: rgb(6, 169, 83);padding-top: 10px;">
                                        <!-- #counter -->
                                        <br>
                                        <div class="col-lg-12">
                                            {{-- <h4 id="hours" class="txt-align-center txt-upper" style="color: white">
                                                 {{ date('Y/m/d H:i:s') }}
                                             </h4>--}}
                                            <strong>
                                                <p class="txt-upper txt-align-center " style="color: white;font-size: 20px">
                                                    Nombre Demandeur Entretien {{ $suivierencontres->count() }}
                                                </p>
                                            </strong>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 1 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="deamndeurs" class="deamndeurs"> {{$rencontres->count() }} </h4>
                                                    <p class="ttle_count">TOTAL DES SUIVIES</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <!-- .row -->
                                            <div class="info">
                                                <!-- 2 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->

                                                    <h4 id="entreprise" class="entreprise">{{$rencontres->where('typerencontre',1)->count() }}</h4>
                                                    <p class="ttle_count">1ere RENCONTRE</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',2)->count() }}</h4>
                                                    <p class="ttle_count">2eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',3)->count() }}</h4>
                                                    <p class="ttle_count">3eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',4)->count() }}</h4>
                                                    <p class="ttle_count">4eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-2">
                                            <div class="info">
                                                <!-- 3 -->
                                                <div class="themeioan_counter text-center"><!-- single counter item -->
                                                    <h4 id="total_number" class="total_number">{{$rencontres->where('typerencontre',5)->count() }}</h4>
                                                    <p class="ttle_count">5eme RENCONTRE</p>
                                                </div><!-- end single counter item -->
                                            </div>
                                        </div>
                                        <!-- .row end -->
                                        <!-- #counter area end -->
                                    </div></div>
                                <div class="col-lg-12">
                                    <br>
                                    {{--<h4 style="text-align: center;color: #f84702;text-transform: uppercase"> Donnees sur les rencontres</h4>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <p class="ttle_count themeioan_counter">MODALITE DE PRISE EN CHARGE</p>
                            <div style="background: white;width: 100%;height:100%;display: block; padding-bottom: 20px;">
                                {{ $recmodalitejs->render()  }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <p class="ttle_count themeioan_counter">PRESENCE DEMANDEUR</p>
                            <div style="background: white;width: 100%;height: 100%;display: block; padding-bottom: 20px;">
                                {!! $prdejs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-4">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <p class="ttle_count themeioan_counter">AXE DE TRAVAIL</p>
                            <div style="background: white;width: 100%;height: 100%;display: block; padding-bottom: 20px;">
                                {!! $recaxetravailjs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

@endsection
@section('js')
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
@endsection

