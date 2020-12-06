@extends('layouts.master')
@section('title') Tableau de Bord @endsection
@section('subTitle') Mes Données @endsection
@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        @if(auth()->user()->hasRole('SuperAdmin'))
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
            <div class="divider">
                <div class="divider-text">MODALITE DE PRISE EN CHARGE</div>
                <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <div class="form-control-position">
                    </div>
                </fieldset>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('modalite','SUIVI')->count() }}</span></h2>
                            <p class="mb-2">SUIVI</p>
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
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('modalite','ACCOMPAGNEMENT')->count() }}</span></h2>
                            <p class="mb-2">ACCOMPAGNEMENT</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                </div>
            </div>
            <div class="divider">
                <div class="divider-text">AXE DE TRAVAIL</div>
                <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <div class="form-control-position">
                    </div>
                </fieldset>
            </div>
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','FCQ')->count() }}</span></h2>
                            <p class="mb-2">FCQ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PNSJ')->count() }}</span></h2>
                            <p class="mb-2">PNSJ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PS')->count() }}</span></h2>
                            <p class="mb-2">PS</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','THIMO')->count() }}</span></h2>
                            <p class="mb-2">THIMO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','AGR')->count() }}</span></h2>
                            <p class="mb-2">AGR</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PISEAF')->count() }}</span></h2>
                            <p class="mb-2">PISEAF</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','ED')->count() }}</span></h2>
                            <p class="mb-2">ED</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PAEP')->count() }}</span></h2>
                            <p class="mb-2">PAEP</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PC')->count() }}</span></h2>
                            <p class="mb-2">PC</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PJ')->count() }}</span></h2>
                            <p class="mb-2">PJ</p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->hasRole('CAgence'))
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
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->count() }}</span></h2>
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
            <div class="divider">
                <div class="divider-text">MODALITE DE PRISE EN CHARGE</div>
                <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <div class="form-control-position">
                    </div>
                </fieldset>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-user text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('modalite','SUIVI')->count() }}</span></h2>
                            <p class="mb-2">SUIVI</p>
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
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('modalite','ACCOMPAGNEMENT')->count() }}</span></h2>
                            <p class="mb-2">ACCOMPAGNEMENT</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                </div>
            </div>
            <div class="divider">
                <div class="divider-text">AXE DE TRAVAIL</div>
                <fieldset class="form-label-group form-group position-relative has-icon-left">
                    <div class="form-control-position">
                    </div>
                </fieldset>
            </div>
            <div class="row">
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1">
                                <span class="badge badge-success">
                                    {{ $rencontres->where('axetravail','FCQ')->count() }}
                                </span>
                            </h2>
                            <p class="mb-2">FCQ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PNSJ')->count() }}</span></h2>
                            <p class="mb-2">PNSJ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PS')->count() }}</span></h2>
                            <p class="mb-2">PS</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','THIMO')->count() }}</span></h2>
                            <p class="mb-2">THIMO</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','AGR')->count() }}</span></h2>
                            <p class="mb-2">AGR</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PISEAF')->count() }}</span></h2>
                            <p class="mb-2">PISEAF</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','ED')->count() }}</span></h2>
                            <p class="mb-2">ED</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PAEP')->count() }}</span></h2>
                            <p class="mb-2">PAEP</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PC')->count() }}</span></h2>
                            <p class="mb-2">PC</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-2">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-success p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-activity text-success font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1"><span class="badge badge-success">{{ $rencontres->where('axetravail','PJ')->count() }}</span></h2>
                            <p class="mb-2">PJ</p>
                        </div>
                    </div>
                </div>
            </div>
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

