@extends('layouts.master')
@section('title') Tableau de Bord @endsection
@section('subTitle') Mes Données @endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}"  rel="stylesheet">
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        @if(auth()->user()->hasRole('SuperAdmin') || auth()->user()->hasRole('CAgence'))

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-center pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 style="text-align: center;color: #f84702;text-transform: uppercase"> PILOTAGE POUR LE CHEF D'AGENCE de {{ Auth::user()->agence->name }}</h4>
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
                                                    Nombre Demandeur Emploi {{ $suivierencontres->count() }}
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

           {{-- <div id="row">
                <div class="col-sm-1 chart-container">
                    <canvas id="chart1" class="" width="100%" height="100%">
                        {!! $prdejs->render() !!}
                    </canvas>
                </div>
                <div class="col-sm-1 chart-container">
                    <canvas id="chart2" width="200" height="200">
                        {!! $prdejs->render() !!}
                    </canvas>
                </div>
                <div class="col-sm-1 chart-container">
                    <canvas id="chart3" width="200" height="200">
                        {!! $prdejs->render() !!}
                    </canvas>
                </div>
                --}}{{--<div style="width:40%;">
                    {!! $prdejs->render() !!}
                </div>--}}{{--
            </div>
            <div id="row">
                <div style="width:40%;">
                    {!! $recmodalitejs->render() !!}
                </div>
            </div>--}}

        @elseif(auth()->user()->hasRole('CEmploi'))
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('typerencontre',1)->count() }}</span></h2>
                            <p class="mb-2">NBRE de DE RECU A LA 1ière RENCONTRE</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('typerencontre',1)->count() }}</span></h2>
                            <p class="mb-2">NBRE de DE RECUS SUR RDV</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('presencedemandeur','ABSENT NON EXCUSE')->count() }}</span></h2>
                            <p class="mb-2">NBRE de DE ABSENTS AU RDV SANS EXCUSE</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('presencedemandeur','ABSENT EXCUSE')->count() }}</span></h2>
                            <p class="mb-2">NBRE de DE EXCUSES</p>
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

