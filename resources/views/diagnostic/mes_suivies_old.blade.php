@extends('layouts.master')
@section('title') Gestion de rencontre @endsection
@section('subTitle') Suivie 1 | 2 | 3 | 4 | 5 @endsection
@section('content')
<section id="socialAccounts" class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs justify-content-end" id="myPillTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="twitter-icon-pill" data-toggle="pill" href="#twitterPIll"
                               role="tab"
                               aria-controls="twitterPIll" aria-selected="false">1ere RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reddit-icon-pill" data-toggle="pill" href="#redditPIll"
                               role="tab"
                               aria-controls="redditPIll" aria-selected="false">2e RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="linkedin-icon-pill" data-toggle="pill" href="#linkedinPIll"
                               role="tab"
                               aria-controls="linkedinPIll" aria-selected="false">3e RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tumblr-icon-pill" data-toggle="pill" href="#tumblrPIll"
                               role="tab"
                               aria-controls="tumblrPIll" aria-selected="false">4e RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pinterest-icon-pill" data-toggle="pill" href="#pinterestPIll"
                               role="tab"
                               aria-controls="pinterestPIll" aria-selected="false">5e & LISTE COMPLETE</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="facebookPagePIll" role="tabpanel"
                             aria-labelledby="facebook-page-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                {{--@if( \App\Helper::canAdd('account') )--}}
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#fb_page_modal">Add New Page
                                        </button>
                                    </div>
                               {{-- @endif--}}
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane fade  show active" id="twitterPIll" role="tabpanel" aria-labelledby="twitter-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                <div class="mb-4">
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered" id="renTb1">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE (h:m:s:ms)</th>
                                            <th>DATE RDV</th>
                                            <th>AXE TRAVAIL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                   {{-- <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE (h:m:s:ms)</th>
                                            <th>DATE RDV</th>
                                            <th>AXE TRAVAIL</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rencontres1 as $item)
                                            @if($item->dateprochainrdv->isFuture())
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    @php
                                                        $output = '';
                                                        $now = Carbon\Carbon::now();
                                                        $end_date = Carbon\Carbon::parse($item->dateprochainrdv);
                                                        $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jour');
                                                    @endphp
                                                    <td class="float-right">
                                                        <span class="badge badge-success mr-1" style="font-size: small;">
                                                            {{$endOutput}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    <td class="float-right">
                                                        <button class="btn btn-primary btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter2rdv"
                                                                data-suivirencontre_id="{{ $item->suivirencontre->id }}"
                                                                data-rencontre_id="{{ $item->id }}"
                                                                data-typerencontre="2"
                                                                >Traiter 2eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if(count($rencontres1) < 1)
                                            <tr>
                                                <td colspan="10" class="text-center">Pas d'suivie trouv?? !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>--}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="redditPIll" role="tabpanel" aria-labelledby="reddit-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                <div class="mb-4">
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered" id="renTb2">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE (h:m:s:ms)</th>
                                            <th>DATE RDV</th>
                                            <th>AXE TRAVAIL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    {{--<table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE RENCONTRE (h:m:s:ms)</th>
                                            <th>DATE RENDEZ-VOUS</th>
                                            <th>AXE TRAVAIL</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rencontres2 as $item)
                                            @if($item->dateprochainrdv->isFuture())
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    @php
                                                        $output = '';
                                                        $now = Carbon\Carbon::now();
                                                        $end_date = Carbon\Carbon::parse($item->dateprochainrdv);
                                                        $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jour');
                                                    @endphp
                                                    <td class="float-right">
                                                        <span class="badge badge-success mr-1" style="font-size: small;">
                                                            {{$endOutput}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    <td class="float-right">
                                                        <button class="btn btn-primary btn-rounded"
                                                                 data-toggle="modal"
                                                                data-target="#traiter3rdv"
                                                                data-suivirencontre_id="{{ $item->suivirencontre->id }}"
                                                                data-rencontre_id="{{ $item->id }}"
                                                                data-typerencontre="3">
                                                                Traiter 3eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if(count($rencontres2) < 1)
                                            <tr>
                                            <td colspan="10" class="text-center">Pas d'suivie trouv?? !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>--}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="linkedinPIll" role="tabpanel"
                             aria-labelledby="linkedin-icon-pill">
                             <div class="d-flex align-items-end flex-column">
                                <div class="mb-4">
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered" id="renTb3">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE (h:m:s:ms)</th>
                                            <th>DATE RDV</th>
                                            <th>AXE TRAVAIL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    {{--<table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE RENCONTRE (h:m:s:ms)</th>
                                            <th>DATE RENDEZ-VOUS</th>
                                            <th>AXE TRAVAIL</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rencontres3 as $item)
                                            @if($item->dateprochainrdv->isFuture())
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    @php
                                                        $output = '';
                                                        $now = Carbon\Carbon::now();
                                                        $end_date = Carbon\Carbon::parse($item->dateprochainrdv);
                                                        $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jour');
                                                    @endphp
                                                    <td class="float-right">
                                                        <span class="badge badge-success mr-1" style="font-size: small;">
                                                            {{$endOutput}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    <td class="float-right">
                                                        <button class="btn btn-primary btn-rounded"
                                                                 data-toggle="modal"
                                                                data-target="#traiter4rdv"
                                                                data-suivirencontre_id="{{ $item->suivirencontre->id }}"
                                                                data-rencontre_id="{{ $item->id }}"
                                                                data-typerencontre="4">
                                                                Traiter 4eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if(count($rencontres3) < 1)
                                            <tr>
                                            <td colspan="10" class="text-center">Pas d'suivie trouv?? !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>--}}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tumblrPIll" role="tabpanel"
                             aria-labelledby="tumblr-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                    <div class="mb-4">
                                    </div>
                            </div>
                             <div>
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered" id="renTb4">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE (h:m:s:ms)</th>
                                            <th>DATE RDV</th>
                                            <th>AXE TRAVAIL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    {{--<table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE RENCONTRE (h:m:s:ms)</th>
                                            <th>DATE RENDEZ-VOUS</th>
                                            <th>AXE TRAVAIL</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rencontres4 as $item)
                                            @if($item->dateprochainrdv->isFuture())
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    @php
                                                        $output = '';
                                                        $now = Carbon\Carbon::now();
                                                        $end_date = Carbon\Carbon::parse($item->dateprochainrdv);
                                                        $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('rdv dans %d jour');
                                                    @endphp
                                                    <td class="float-right">
                                                        <span class="badge badge-success mr-1" style="font-size: small;">
                                                            {{$endOutput}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    <td class="float-right">
                                                        <button class="btn btn-primary btn-rounded"
                                                                 data-toggle="modal"
                                                                data-target="#traiter5rdv"
                                                                data-suivirencontre_id="{{ $item->suivirencontre->id }}"
                                                                data-rencontre_id="{{ $item->id }}"
                                                                data-typerencontre="5">
                                                                Traiter 5eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @if(count($rencontres4) < 1)
                                            <tr>
                                            <td colspan="10" class="text-center">Pas d'suivie trouv?? !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>--}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pinterestPIll" role="tabpanel"
                             aria-labelledby="pinterest-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                    <div class="mb-4">
                                    </div>
                            </div>
                           <div>
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered" id="renTb5">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE (h:m:s:ms)</th>
                                            <th>DATE RDV</th>
                                            <th>AXE TRAVAIL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                   {{-- <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE RENCONTRE (h:m:s:ms)</th>
                                            <th>DATE RENDEZ-VOUS</th>
                                            <th>AXE TRAVAIL</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rencontres5 as $item)
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                </tr>
                                        @endforeach
                                        @if(count($rencontres5) < 1)
                                            <tr>
                                            <td colspan="10" class="text-center">Pas d'suivie trouv?? !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{--modal rencontre 1 vers 2 --}}
            <div class="modal fade" id="traiter2rdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title text-white" id="myModalLabel16">Renseigner 2eme Rencontre</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('diagnostik.store1to2rencontre') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Duree de la rencontre</label>
                                                <input type="text" class="form-control" id="dureerencontre" name="rencontre[dureerencontre]" required>
                                            </div>
                                            <div class="form-group text-right mb-0">
                                                <button type="button" id="start" class="btn btn-success">
                                                    <i class="feather icon-play"></i>
                                                </button>
                                                <button type="button" id="stop" class="btn btn-warning">
                                                    <i class="feather icon-pause"></i>
                                                </button>
                                                <button type="button" id="init" class="btn btn-info">
                                                    <i class="feather icon-refresh-ccw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rencontre[suivirencontre_id]" id="suivirencontre_id" value="">
                                    <input type="hidden" name="rencontre[typerencontre]" id="typerencontre" value="">
                                    <input type="hidden" name="rencontre_id" id="rencontre_id" value="">
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Presence demandeur</label>
                                                <select name="rencontre[presencedemandeur]"  id="presencedemandeur" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('PRESENT')}}">{{__('PRESENT')}}</option>
                                                    <option value="{{__('ABSENT EXCUSE')}}">{{__('ABSENT EXCUSE')}}</option>
                                                    <option value="{{__('ABSENT NON EXCUSE')}}">{{__('ABSENT NON EXCUSE')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Avez vous entretenu le demandeur avec l'approche</label>
                                                <select name="rencontre[approche]"  id="approche" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('SOFT')}}">{{__('SOFT')}}</option>
                                                    <option value="{{__('SKILLS')}}">{{__('SKILLS')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Modalite de prise en charge</label>
                                                <select name="rencontre[modalite]" id="modalite" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('ACCOMPAGNEMENT')}}">{{__('ACCOMPAGNEMENT')}}</option>
                                                    <option value="{{__('SUIVI')}}">{{__('SUIVI')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Axe de travail</label>
                                                <select name="rencontre[axetravail]" id="axetravail" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('FCQ')}}">{{__('FCQ')}}</option>
                                                    <option value="{{__('PNSJ')}}">{{__('PNSJ')}}</option>
                                                    <option value="{{__('PS')}}">{{__('PS')}}</option>
                                                    <option value="{{__('THIMO')}}">{{__('THIMO')}}</option>
                                                    <option value="{{__('AGR')}}">{{__('AGR')}}</option>
                                                    <option value="{{__('PISEAF')}}">{{__('PISEAF')}}</option>
                                                    <option value="{{__('ED')}}">{{__('ED')}}</option>
                                                    <option value="{{__('PAEP')}}">{{__('PAEP')}}</option>
                                                    <option value="{{__('PC')}}">{{__('PC')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Date prochain RDV</label>
                                                <input type="date" name="rencontre[dateprochainrdv]" id="dateprochainrdv" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Plan d'action</label>
                                                <textarea name="rencontre[planaction]" id="planaction" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="observation">Observation</label>
                                                <textarea name="rencontre[observation]" id="observation" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--form control-->
                                <div class="form-group text-right mb-0">
                                    <button type="submit" id="aej_ok" class="btn btn-success">valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{--modal rencontre 2 vers 3 --}}
            <div class="modal fade" id="traiter3rdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title text-white" id="myModalLabel16">Renseigner 3eme Rencontre</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('diagnostik.store2to3rencontre') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Duree de la rencontre</label>
                                                <input type="text" class="form-control" id="dureerencontre1" name="rencontre[dureerencontre]" required>
                                            </div>
                                            <div class="form-group text-right mb-0">
                                                <button type="button" id="start1" class="btn btn-success">
                                                    <i class="feather icon-play"></i>
                                                </button>
                                                <button type="button" id="stop1" class="btn btn-warning">
                                                    <i class="feather icon-pause"></i>
                                                </button>
                                                <button type="button" id="init1" class="btn btn-info">
                                                    <i class="feather icon-refresh-ccw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rencontre[suivirencontre_id]" id="suivirencontre_id" value="">
                                    <input type="hidden" name="rencontre[typerencontre]" id="typerencontre" value="">
                                    <input type="hidden" name="rencontre_id" id="rencontre_id" value="">
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Presence demandeur</label>
                                                <select name="rencontre[presencedemandeur]"  id="presencedemandeur" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('PRESENT')}}">{{__('PRESENT')}}</option>
                                                    <option value="{{__('ABSENT EXCUSE')}}">{{__('ABSENT EXCUSE')}}</option>
                                                    <option value="{{__('ABSENT NON EXCUSE')}}">{{__('ABSENT NON EXCUSE')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Avez vous entretenu le demandeur avec l'approche</label>
                                                <select name="rencontre[approche]"  id="approche" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('SOFT')}}">{{__('SOFT')}}</option>
                                                    <option value="{{__('SKILLS')}}">{{__('SKILLS')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Modalite de prise en charge</label>
                                                <select name="rencontre[modalite]" id="modalite" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('ACCOMPAGNEMENT')}}">{{__('ACCOMPAGNEMENT')}}</option>
                                                    <option value="{{__('SUIVI')}}">{{__('SUIVI')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Axe de travail</label>
                                                <select name="rencontre[axetravail]" id="axetravail" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('FCQ')}}">{{__('FCQ')}}</option>
                                                    <option value="{{__('PNSJ')}}">{{__('PNSJ')}}</option>
                                                    <option value="{{__('PS')}}">{{__('PS')}}</option>
                                                    <option value="{{__('THIMO')}}">{{__('THIMO')}}</option>
                                                    <option value="{{__('AGR')}}">{{__('AGR')}}</option>
                                                    <option value="{{__('PISEAF')}}">{{__('PISEAF')}}</option>
                                                    <option value="{{__('ED')}}">{{__('ED')}}</option>
                                                    <option value="{{__('PAEP')}}">{{__('PAEP')}}</option>
                                                    <option value="{{__('PC')}}">{{__('PC')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Date prochain RDV</label>
                                                <input type="date" name="rencontre[dateprochainrdv]" id="dateprochainrdv" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Plan d'action</label>
                                                <textarea name="rencontre[planaction]" id="planaction" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="observation">Observation</label>
                                                <textarea name="rencontre[observation]" id="observation" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--form control-->
                                <div class="form-group text-right mb-0">
                                    <button type="submit" id="aej_ok" class="btn btn-success">valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            {{--modal rencontre 3 vers 4 --}}
            <div class="modal fade" id="traiter4rdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title text-white" id="myModalLabel16">Renseigner 3eme Rencontre</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('diagnostik.store2to3rencontre') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Duree de la rencontre</label>
                                                <input type="text" class="form-control" id="dureerencontre2" name="rencontre[dureerencontre]" required>
                                            </div>
                                            <div class="form-group text-right mb-0">
                                                <button type="button" id="start2" class="btn btn-success">
                                                    <i class="feather icon-play"></i>
                                                </button>
                                                <button type="button" id="stop2" class="btn btn-warning">
                                                    <i class="feather icon-pause"></i>
                                                </button>
                                                <button type="button" id="init2" class="btn btn-info">
                                                    <i class="feather icon-refresh-ccw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rencontre[suivirencontre_id]" id="suivirencontre_id" value="">
                                    <input type="hidden" name="rencontre[typerencontre]" id="typerencontre" value="">
                                    <input type="hidden" name="rencontre_id" id="rencontre_id" value="">
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Presence demandeur</label>
                                                <select name="rencontre[presencedemandeur]"  id="presencedemandeur" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('PRESENT')}}">{{__('PRESENT')}}</option>
                                                    <option value="{{__('ABSENT EXCUSE')}}">{{__('ABSENT EXCUSE')}}</option>
                                                    <option value="{{__('ABSENT NON EXCUSE')}}">{{__('ABSENT NON EXCUSE')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Avez vous entretenu le demandeur avec l'approche</label>
                                                <select name="rencontre[approche]"  id="approche" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('SOFT')}}">{{__('SOFT')}}</option>
                                                    <option value="{{__('SKILLS')}}">{{__('SKILLS')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Modalite de prise en charge</label>
                                                <select name="rencontre[modalite]" id="modalite" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('ACCOMPAGNEMENT')}}">{{__('ACCOMPAGNEMENT')}}</option>
                                                    <option value="{{__('SUIVI')}}">{{__('SUIVI')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Axe de travail</label>
                                                <select name="rencontre[axetravail]" id="axetravail" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('FCQ')}}">{{__('FCQ')}}</option>
                                                    <option value="{{__('PNSJ')}}">{{__('PNSJ')}}</option>
                                                    <option value="{{__('PS')}}">{{__('PS')}}</option>
                                                    <option value="{{__('THIMO')}}">{{__('THIMO')}}</option>
                                                    <option value="{{__('AGR')}}">{{__('AGR')}}</option>
                                                    <option value="{{__('PISEAF')}}">{{__('PISEAF')}}</option>
                                                    <option value="{{__('ED')}}">{{__('ED')}}</option>
                                                    <option value="{{__('PAEP')}}">{{__('PAEP')}}</option>
                                                    <option value="{{__('PC')}}">{{__('PC')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Date prochain RDV</label>
                                                <input type="date" name="rencontre[dateprochainrdv]" id="dateprochainrdv" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Plan d'action</label>
                                                <textarea name="rencontre[planaction]" id="planaction" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="observation">Observation</label>
                                                <textarea name="rencontre[observation]" id="observation" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--form control-->
                                <div class="form-group text-right mb-0">
                                    <button type="submit" id="aej_ok" class="btn btn-success">valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--modal rencontre 4 vers 5 --}}
            <div class="modal fade" id="traiter5rdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title text-white" id="myModalLabel16">Renseigner 3eme Rencontre</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('diagnostik.store2to3rencontre') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Duree de la rencontre</label>
                                                <input type="text" class="form-control" id="dureerencontre3" name="rencontre[dureerencontre]" required>
                                            </div>
                                            <div class="form-group text-right mb-0">
                                                <button type="button" id="start3" class="btn btn-success">
                                                    <i class="feather icon-play"></i>
                                                </button>
                                                <button type="button" id="stop3" class="btn btn-warning">
                                                    <i class="feather icon-pause"></i>
                                                </button>
                                                <button type="button" id="init3" class="btn btn-info">
                                                    <i class="feather icon-refresh-ccw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rencontre[suivirencontre_id]" id="suivirencontre_id" value="">
                                    <input type="hidden" name="rencontre[typerencontre]" id="typerencontre" value="">
                                    <input type="hidden" name="rencontre_id" id="rencontre_id" value="">
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Presence demandeur</label>
                                                <select name="rencontre[presencedemandeur]"  id="presencedemandeur" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('PRESENT')}}">{{__('PRESENT')}}</option>
                                                    <option value="{{__('ABSENT EXCUSE')}}">{{__('ABSENT EXCUSE')}}</option>
                                                    <option value="{{__('ABSENT NON EXCUSE')}}">{{__('ABSENT NON EXCUSE')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="approche">Avez vous entretenu le demandeur avec l'approche</label>
                                                <select name="rencontre[approche]"  id="approche" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('SOFT')}}">{{__('SOFT')}}</option>
                                                    <option value="{{__('SKILLS')}}">{{__('SKILLS')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Modalite de prise en charge</label>
                                                <select name="rencontre[modalite]" id="modalite" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('ACCOMPAGNEMENT')}}">{{__('ACCOMPAGNEMENT')}}</option>
                                                    <option value="{{__('SUIVI')}}">{{__('SUIVI')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="modalite">Axe de travail</label>
                                                <select name="rencontre[axetravail]" id="axetravail" class="form-control">
                                                    <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                                    <option value="{{__('FCQ')}}">{{__('FCQ')}}</option>
                                                    <option value="{{__('PNSJ')}}">{{__('PNSJ')}}</option>
                                                    <option value="{{__('PS')}}">{{__('PS')}}</option>
                                                    <option value="{{__('THIMO')}}">{{__('THIMO')}}</option>
                                                    <option value="{{__('AGR')}}">{{__('AGR')}}</option>
                                                    <option value="{{__('PISEAF')}}">{{__('PISEAF')}}</option>
                                                    <option value="{{__('ED')}}">{{__('ED')}}</option>
                                                    <option value="{{__('PAEP')}}">{{__('PAEP')}}</option>
                                                    <option value="{{__('PC')}}">{{__('PC')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Date prochain RDV</label>
                                                <input type="date" name="rencontre[dateprochainrdv]" id="dateprochainrdv" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="planaction">Plan d'action</label>
                                                <textarea name="rencontre[planaction]" id="planaction" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="observation">Observation</label>
                                                <textarea name="rencontre[observation]" id="observation" rows="1" class="form-control" required="">
                                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--form control-->
                                <div class="form-group text-right mb-0">
                                    <button type="submit" id="aej_ok" class="btn btn-success">valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Modal de Suppression -->
            <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger white">
                            <h4 class="modal-title" id="myModalLabel16">Delete Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['route'=>'diagnostik.destroy', 'files'=>true , 'methode' => 'POST']) }}
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <p class="text-center">
                                    Are you sure you want to delete this?
                                </p>
                                <input type="hidden" name="account_id" id="account_id" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel
                                </button>
                                <button type="submit" class="btn btn-warning">Yes, Delete</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script type="text/javascript" src="https://daokun.webs.com/jquery.stopwatch.js"></script>

    <script>

        $('#traiter2rdv').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var typerencontre = button.data('typerencontre');
            var suivirencontre_id = button.data('suivirencontre_id');
            var rencontre_id = button.data('rencontre_id');
            var modal = $(this);
            modal.find('.modal-body #suivirencontre_id').val(suivirencontre_id);
            modal.find('.modal-body #typerencontre').val(typerencontre);
            modal.find('.modal-body #rencontre_id').val(rencontre_id);
        });

        $('#traiter3rdv').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var typerencontre = button.data('typerencontre');
            var suivirencontre_id = button.data('suivirencontre_id');
            var rencontre_id = button.data('rencontre_id');
            var modal = $(this);
            modal.find('.modal-body #suivirencontre_id').val(suivirencontre_id);
            modal.find('.modal-body #typerencontre').val(typerencontre);
            modal.find('.modal-body #rencontre_id').val(rencontre_id);
        });

         $('#traiter3rdv').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var typerencontre = button.data('typerencontre');
            var suivirencontre_id = button.data('suivirencontre_id');
            var rencontre_id = button.data('rencontre_id');
            var modal = $(this);
            modal.find('.modal-body #suivirencontre_id').val(suivirencontre_id);
            modal.find('.modal-body #typerencontre').val(typerencontre);
            modal.find('.modal-body #rencontre_id').val(rencontre_id);
        });

         $('#traiter4rdv').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var typerencontre = button.data('typerencontre');
            var suivirencontre_id = button.data('suivirencontre_id');
            var rencontre_id = button.data('rencontre_id');
            var modal = $(this);
            modal.find('.modal-body #suivirencontre_id').val(suivirencontre_id);
            modal.find('.modal-body #typerencontre').val(typerencontre);
            modal.find('.modal-body #rencontre_id').val(rencontre_id);
        });

         $('#traiter5rdv').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var typerencontre = button.data('typerencontre');
            var suivirencontre_id = button.data('suivirencontre_id');
            var rencontre_id = button.data('rencontre_id');
            var modal = $(this);
            modal.find('.modal-body #suivirencontre_id').val(suivirencontre_id);
            modal.find('.modal-body #typerencontre').val(typerencontre);
            modal.find('.modal-body #rencontre_id').val(rencontre_id);
        });




        $(function () {
            var centiemeSeconde = 0;
            var seconde = 0;
            var minute = 0;
            var heure = 0;
            var comptage;
            function  chrono () {
                if(centiemeSeconde<99){
                    centiemeSeconde++;
                }else{
                    centiemeSeconde = 0;
                    if(seconde<59){
                        seconde ++;
                    }else{
                        seconde =0;
                        if(minute<59){
                            minute++;
                        }else{
                            minute=0;
                            heure++;
                        }
                    }
                }

                $('#dureerencontre').val(heure +':'+ minute +':'+ seconde +':'+ centiemeSeconde);
            }
            $('#start').click(function () {
                comptage = setInterval(chrono,10);
                $(this).attr('disabled','disabled')
                $('#init').attr('disabled','disabled')
                $('#stop').removeAttr('disabled')
            });

            $('#stop').click(function(){
                clearInterval(comptage);
                $(this).attr('disabled','disabled')
                $('#start').removeAttr('disabled')
                $('#init').removeAttr('disabled')
            });

            $('#init').click(function(){
                centiemeSeconde = 0;
                seconde = 0;
                minute = 0;
                heure = 0;
                $('#dureerencontre').val('00:00:00:00');
                $(this).attr('disabled','disabled')
                $('#start').removeAttr('disabled')
                $('#stop').attr('disabled','disabled');
            });

        });

        $(function () {
            var centiemeSeconde = 0;
            var seconde = 0;
            var minute = 0;
            var heure = 0;
            var comptage;
            function  chrono () {
                if(centiemeSeconde<99){
                    centiemeSeconde++;
                }else{
                    centiemeSeconde = 0;
                    if(seconde<59){
                        seconde ++;
                    }else{
                        seconde =0;
                        if(minute<59){
                            minute++;
                        }else{
                            minute=0;
                            heure++;
                        }
                    }
                }

                $('#dureerencontre1').val(heure +':'+ minute +':'+ seconde +':'+ centiemeSeconde);
            }
            $('#start1').click(function () {
                comptage = setInterval(chrono,10);
                $(this).attr('disabled','disabled')
                $('#init1').attr('disabled','disabled')
                $('#stop1').removeAttr('disabled')
            });

            $('#stop1').click(function(){
                clearInterval(comptage);
                $(this).attr('disabled','disabled')
                $('#start1').removeAttr('disabled')
                $('#init1').removeAttr('disabled')
            });

            $('#init1').click(function(){
                centiemeSeconde = 0;
                seconde = 0;
                minute = 0;
                heure = 0;
                $('#dureerencontre1').val('00:00:00:00');
                $(this).attr('disabled','disabled')
                $('#start1').removeAttr('disabled')
                $('#stop1').attr('disabled','disabled');
            });
        });

        $(function () {
            var centiemeSeconde = 0;
            var seconde = 0;
            var minute = 0;
            var heure = 0;
            var comptage;
            function  chrono () {
                if(centiemeSeconde<99){
                    centiemeSeconde++;
                }else{
                    centiemeSeconde = 0;
                    if(seconde<59){
                        seconde ++;
                    }else{
                        seconde =0;
                        if(minute<59){
                            minute++;
                        }else{
                            minute=0;
                            heure++;
                        }
                    }
                }

                $('#dureerencontre2').val(heure +':'+ minute +':'+ seconde +':'+ centiemeSeconde);
            }
            $('#start2').click(function () {
                comptage = setInterval(chrono,10);
                $(this).attr('disabled','disabled')
                $('#init2').attr('disabled','disabled')
                $('#stop2').removeAttr('disabled')
            });

            $('#stop2').click(function(){
                clearInterval(comptage);
                $(this).attr('disabled','disabled')
                $('#start2').removeAttr('disabled')
                $('#init2').removeAttr('disabled')
            });

            $('#init2').click(function(){
                centiemeSeconde = 0;
                seconde = 0;
                minute = 0;
                heure = 0;
                $('#dureerencontre2').val('00:00:00:00');
                $(this).attr('disabled','disabled')
                $('#start2').removeAttr('disabled')
                $('#stop2').attr('disabled','disabled');
            });
        });

        $(function () {
            var centiemeSeconde = 0;
            var seconde = 0;
            var minute = 0;
            var heure = 0;
            var comptage;
            function  chrono () {
                if(centiemeSeconde<99){
                    centiemeSeconde++;
                }else{
                    centiemeSeconde = 0;
                    if(seconde<59){
                        seconde ++;
                    }else{
                        seconde =0;
                        if(minute<59){
                            minute++;
                        }else{
                            minute=0;
                            heure++;
                        }
                    }
                }

                $('#dureerencontre3').val(heure +':'+ minute +':'+ seconde +':'+ centiemeSeconde);
            }
            $('#start3').click(function () {
                comptage = setInterval(chrono,10);
                $(this).attr('disabled','disabled')
                $('#init3').attr('disabled','disabled')
                $('#stop3').removeAttr('disabled')
            });

            $('#stop3').click(function(){
                clearInterval(comptage);
                $(this).attr('disabled','disabled')
                $('#start3').removeAttr('disabled')
                $('#init3').removeAttr('disabled')
            });

            $('#init3').click(function(){
                centiemeSeconde = 0;
                seconde = 0;
                minute = 0;
                heure = 0;
                $('#dureerencontre3').val('00:00:00:00');
                $(this).attr('disabled','disabled')
                $('#start3').removeAttr('disabled')
                $('#stop3').attr('disabled','disabled');
            });

        });

        $('textarea').each(function(){
            $(this).val($(this).val().trim());
        });

        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var account_id = button.data('account_id');
            var modal = $(this);
            modal.find('.modal-body #account_id').val(account_id);
        })
    </script>

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $('#renTb1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('diagnostik.getrec1') }}'
                },
                columns: [
                    {data: 'matricule_aej'},
                    {data: 'nomprenom'},
                    {data: 'sexe'},
                    {data: 'lieudereisdence'},
                    {data: 'diplome', orderable: false, searchable: false},
                    {data: 'dureerencontre'},
                    {data: 'dateprochainrdv'},
                    {data: 'axetravail'},
                    {data: 'action', orderable: false, searchable: false},
                ]
            });

            $('#renTb2').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('diagnostik.getrec2') }}'
                },
                columns: [
                    {data: 'matricule_aej'},
                    {data: 'nomprenom'},
                    {data: 'sexe'},
                    {data: 'lieudereisdence'},
                    {data: 'diplome', orderable: false, searchable: false},
                    {data: 'dureerencontre'},
                    {data: 'dateprochainrdv'},
                    {data: 'axetravail'},
                    {data: 'action', orderable: false, searchable: false},
                ]
            });

            $('#renTb3').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('diagnostik.getrec3') }}'
                },
                columns: [
                    {data: 'matricule_aej'},
                    {data: 'nomprenom'},
                    {data: 'sexe'},
                    {data: 'lieudereisdence'},
                    {data: 'diplome', orderable: false, searchable: false},
                    {data: 'dureerencontre'},
                    {data: 'dateprochainrdv'},
                    {data: 'axetravail'},
                    {data: 'action', orderable: false, searchable: false},
                ]
            });

            $('#renTb4').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('diagnostik.getrec4') }}'
                },
                columns: [
                    {data: 'matricule_aej'},
                    {data: 'nomprenom'},
                    {data: 'sexe'},
                    {data: 'lieudereisdence'},
                    {data: 'diplome', orderable: false, searchable: false},
                    {data: 'dureerencontre'},
                    {data: 'dateprochainrdv'},
                    {data: 'axetravail'},
                    {data: 'action', orderable: false, searchable: false},
                ]
            });

            $('#renTb5').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('diagnostik.getrec5') }}'
                },
                columns: [
                    {data: 'matricule_aej'},
                    {data: 'nomprenom'},
                    {data: 'sexe'},
                    {data: 'lieudereisdence'},
                    {data: 'diplome', orderable: false, searchable: false},
                    {data: 'dureerencontre'},
                    {data: 'dateprochainrdv'},
                    {data: 'axetravail'},
                    {data: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
