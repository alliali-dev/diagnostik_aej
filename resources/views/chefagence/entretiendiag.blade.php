@extends('layouts.master')

@section('title') Entretien Diagnostique @endsection

@section('subTitle') @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Conseiller Emploi</label>
                            <select name="cemploi" id="cemploi" class="form-control">
                                <option value="" selected> {{ __('--Choisir Conseiller Emploi--') }}</option>
                                @foreach($cemplois as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label>Date Creation de Debut</label>
                            <input type="text" id="datedebut" name="datedebut" class="form-control datepicker" data-date-format="mm/dd/yyyy">
                        </div>
                        <div class="col-sm-2">
                            <label>Date de Fin</label>
                            <input type="text" id="datefin" name="datefin" class="form-control datepicker" data-date-format="mm/dd/yyyy">
                        </div>
                        <div style="margin-top: 10px">
                            <button class="btn btn-warning waves-effect waves-light" type="button" style="height: 45px" id="search">
                                Recherche
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('chefagence.exportFilterEntretient') }}" method="POST">
                            @csrf()
                            <input type="hidden" name="cemploi" id="cemploi_e" value="{{\request('cemploi')}}">
                            <input type="hidden" name="datedebut" id="datedebut_e"  value="{{\request('datedebut')}}">
                            <input type="hidden" name="datefin" id="datefin_e" value="{{\request('datefin')}}">
                            <button type="submit" class="btn btn-success">
                                Export Excel
                            </button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="table-responsive-sm">
                    <table class="table" id="rec" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>#n aej</th>
                            <th>nom</th>
                            <th>niveau formaion</th>
                            <th>niveau experience</th>
                            <th>adéquation formation expérience</th>
                            <th>Connaissance du métier / activité</th>
                            <th>Adéquation formation métier / activité</th>
                            <th>Adéquation expérience métier / activité</th>
                            <th>Maîtrise de l'outils de recherche d'emploi</th>
                            <th>Connaissance des exigence du marché</th>
                            <th>Dépôtde dossier en entreprise</th>
                            <th>conseiller referent</th>
                        </tr>
                        </thead>
                        <tbody id="rencontreRow">
                        @forelse($entretiens as $item)
                            <tr>
                                <td> {{ $item->matriculeaej }}</td>
                                <td> {{ $item->nomprenom }}</td>
                                <td> {{ $item->niveauformaion }}</td>
                                <td> {{ $item->niveauexperience }}</td>
                                <td> {{ $item->adeqormaexper }}</td>
                                <td> {{ $item->conmetieractiv }}</td>
                                <td> {{ $item->adqformmetieractiv }}</td>
                                <td> {{ $item->adqexpmetieractiv }}</td>
                                <td> {{ $item->maitoutrechempl }}</td>
                                <td> {{ $item->conexigmarch }}</td>
                                <td> {{ $item->depdossent }}</td>
                                <td> {{  \App\Models\User::find($item->user_id)->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Pas de suivie trouvé !</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                     <div id="resultcount">
                        nbre de ligne  {{ $entretiens->count() }}
                    </div>
                    <p align="center">
                    <div id="loader" class="text-center" style="display: none;">
                    <!--img src="{{ asset('img/loader_squares.gif') }}" alt="Loader"-->
                        <div class="spinner-border" role="status" style="color: #b84751">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    </p>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-2">
                        {{--  {{ $agences->links() }}--}}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('jqueryui/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#datedebut").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datedebut").focus(function() {
                $("#datedebut").datepicker("show");
            });
           // $("#datedebut").focus();

            /////
            $("#datefin").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datefin").focus(function() {
                $("#datefin").datepicker("show");
            });
           // $("#datefin").focus();
        });
    </script>
    <script>
        $('#cemploi').change(function() {
            $('#cemploi_e').val($('#cemploi').val());
        });

        $('#datedebut').change(function() {
            $('#datedebut_e').val($('#datedebut').val());
        });

        $('#datefin').change(function() {
            $('#datefin_e').val($('#datefin').val());
        });
    </script>
    <script>
        $('#search').on('click', function (e) {
            var rencontreRow = $('#rencontreRow')
          //  var typerencontre = $('#typerencontre').val();
            var cemploi = $('#cemploi').val();
            var datedebut = $('#datedebut').val();
            var datefin = $('#datefin').val();
            var resultcount = $('#resultcount');

            rencontreRow.empty();
            resultcount.empty();
            $('#loader').fadeIn();
            var url_rencontre = "{{ route('chefagence.filter_entretient')  }}";
           // var url_detailsdemandeur = "{{ route('chefagence.filter_entretient')  }}";
            $.ajax({
                method: "GET",
                url: url_rencontre,
                data: {
                   // 'typerencontre': typerencontre ,
                    'cemploi' : cemploi,
                    'datedebut' : datedebut,
                    'datefin' : datefin,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function( data ) {
                console.log(data);
                $.each( data, function( key, value ) {
                    rencontreRow.append(`<tr>
                   <td>${value.matriculeaej}</td>
                   <td>${value.nomprenom}</td>
                   <td>${value.niveauformaion}</td>
                   <td>${value.niveauexperience}</td>
                   <td>${value.adeqormaexper}</td>
                   <td>${value.conmetieractiv}</td>
                   <td>${value.adqformmetieractiv}</td>
                   <td>${value.adqexpmetieractiv}</td>
                   <td>${value.maitoutrechempl}</td>
                   <td>${value.conexigmarch}</td>
                   <td>${value.depdossent}</td>
                   <td>${value.conseiller}</td>
                </tr>`);
                });
                 resultcount.append('nbre de ligne ' +data.length);
                $('#loader').fadeOut();
            });

        });
    </script>
@endsection

