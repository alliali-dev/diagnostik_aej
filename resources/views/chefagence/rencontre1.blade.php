@extends('layouts.master')

@section('title') 1ere Rencontre @endsection

@section('subTitle') par Conseil Emploie & Guichet emploi @endsection

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
                           <legend>Filtre</legend>
                           <div class="col-sm-3">
                               <label>Rencontre</label>
                               <select name="typerencontre" id="typerencontre" class="form-control">
                                   <option value="" selected> {{ __('--Choisir type rencontre--') }}</option>
                                   @foreach($typerencontres as $item)
                                       <option value="{{ $item['id'] }}"> {{ $item['name']  }}</option>
                                   @endforeach
                               </select>
                           </div>
                       <div class="col-sm-3">
                           <label>Conseiller Emploi</label>
                           <select name="cemploi" id="cemploi" class="form-control">
                               <option value="" selected> {{ __('--Choisir Conseiller Emploi--') }}</option>
                               @foreach($cemplois as $item)
                                   <option value="{{ $item->id }}"> {{ $item->name }}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="col-sm-3">
                           <label>Date de Debut RDV</label>
                           <input type="text" id="datedebut" name="datedebut" class="form-control">
                       </div>
                       <div class="col-sm-3">
                           <label>Date de Fin RDV</label>
                           <input type="text" id="datefin" name="datefin" class="form-control">
                       </div>
                   </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Modalite</label>
                            <select name="modalite" id="modalite" class="form-control">
                                <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                <option value="{{__('ACCOMPAGNEMENT')}}">{{__('ACCOMPAGNEMENT')}}</option>
                                <option value="{{__('SUIVI')}}">{{__('SUIVI')}}</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="modalite">Axe de travail</label>
                            <select name="axetravail" id="axetravail" class="form-control">
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
                        <div class="col-sm-3">
                            <label for="approche">Approche SOFT SKILLS</label>
                            <select name="approche" id="approche" class="form-control">
                                <option value="{{__('')}}" selected>{{__('-- selectionner --')}}</option>
                                <option value="{{__('OUI')}}">{{__('OUI')}}</option>
                                <option value="{{__('NON')}}">{{__('NON')}}</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-top: 10px">
                        <button class="btn btn-warning waves-effect waves-light" type="button" style="height: 45px" id="search">
                            recherche
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('chefagence.exportFilter') }}" method="POST">
                            @csrf()
                            <input type="hidden" name="typerencontre" id="typerencontre_e" value="{{\request('typerencontre')}}">
                            <input type="hidden" name="cemploi" id="cemploi_e" value="{{\request('cemploi')}}">
                            <input type="hidden" name="datedebut" id="datedebut_e"  value="{{\request('datedebut')}}">
                            <input type="hidden" name="datefin" id="datefin_e" value="{{\request('datefin')}}">
                            <input type="hidden" name="modalite" id="modalite_e" value="{{\request('modalite')}}">
                            <input type="hidden" name="axetravail" id="axetravail_e" value="{{\request('axetravail')}}">
                            <input type="hidden" name="approche" id="approche_e" value="{{\request('approche')}}">
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
                            <th>N AEJ</th>
                            <th>NOM PRENOM</th>
                            <th>SEXE</th>
                            <th>COMMUNE</th>
                            <th>DIPLOME</th>
                            <th>DUREE (h:m:s:ms)</th>
                            <th>DATE RDV</th>
                            <th>AXE TRAVAIL</th>
                            <th>CONSEILLER REFERENT</th>
                        </tr>
                        </thead>
                        <tbody id="rencontreRow">
                           @forelse($rencontres as $item)
                               <tr>
                                   <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                   <td>{{ $item->suivirencontre->nomprenom }}</td>
                                   <td>{{ $item->suivirencontre->sexe }}</td>
                                   <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                   <td>{{ $item->suivirencontre->diplome }}</td>
                                   <td>{{ $item->dureerencontre }}</td>
                                   <td>{{ $item->dateprochainrdv }}</td>
                                   <td>{{ $item->axetravail }}</td>
                                   <td>{{ \App\Models\User::find($item->user_id)->name }}</td>
                                   <td class="float-right">
                                       <a href="{{ route('chefagence.detaildemandeur',$item->suivirencontre->id)  }}" target="_blank"
                                          class="btn btn-primary white waves-effect waves-light">
                                           Details
                                       </a>
                                   </td>
                               </tr>
                           @empty
                               <tr>
                                   <td colspan="10" class="text-center">Pas de suivie trouvé !</td>
                               </tr>
                           @endforelse
                        </tbody>
                    </table>
                    <div id="resultcount">
                        nbre de ligne  {{ $rencontres->count() }}
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
            //$("#datedebut").focus();

            /////
            $("#datefin").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#datefin").focus(function() {
                $("#datefin").datepicker("show");
            });
            //$("#datefin").focus();
        });
    </script>
    <script>

        $('#typerencontre').change(function() {
            $('#typerencontre_e').val($('#typerencontre').val());
        });

        $('#cemploi').change(function() {
            $('#cemploi_e').val($('#cemploi').val());
        });

        $('#datedebut').change(function() {
            $('#datedebut_e').val($('#datedebut').val());
        });

        $('#datefin').change(function() {
            $('#datefin_e').val($('#datefin').val());
        });

        $('#modalite').change(function() {
            $('#modalite_e').val($('#modalite').val());
        });

        $('#axetravail').change(function() {
            $('#axetravail_e').val($('#axetravail').val());
        });

        $('#approche').change(function() {
            $('#approche_e').val($('#approche').val());
        });


        $('#search').on('click', function (e) {
            var rencontreRow = $('#rencontreRow')
            var typerencontre = $('#typerencontre').val();
            var cemploi = $('#cemploi').val();
            var datedebut = $('#datedebut').val();
            var datefin = $('#datefin').val();
            var modalite = $('#modalite').val();
            var axetravail = $('#axetravail').val();
            var approche = $('#approche').val();
            var resultcount = $('#resultcount');

            resultcount.empty();
            rencontreRow.empty();

            $('#loader').fadeIn();
            var url_rencontre = "{{route('chefagence.filter')}}";
            var url_detailsdemandeur = "{{route('chefagence.detaildemandeur')}}";
            $.ajax({
                method: "GET",
                url: url_rencontre,
                data: {
                    'typerencontre': typerencontre ,
                    'cemploi' : cemploi,
                    'datedebut' : datedebut,
                    'datefin' : datefin,
                    'modalite' : modalite,
                    'axetravail' : axetravail,
                    'approche' : approche,
                    _token: "{{ csrf_token() }}"
                }
            }).done(function( data ) {
                console.log(data.length);
                $.each( data, function( key, value ) {
                    rencontreRow.append(`<tr>
                   <td>${value.matricule_aej}</td>
                   <td>${value.nomprenom}</td>
                   <td>${value.sexe}</td>
                   <td>${value.lieudereisdence}</td>
                   <td>${value.diplome}</td>
                   <td>${value.dureerencontre}</td>
                   <td>${value.dateprochainrdv}</td>
                   <td>${value.axetravail}</td>
                   <td>${value.conseiller}</td>
                    <td class="float-right">
                         <a href="${url_detailsdemandeur +'/'+ value.id }" target="_blank"
                           class="btn btn-primary white waves-effect waves-light">
                            Details
                         </a>
                    </td>
                </tr>
                `);
                });
                resultcount.append('nbre de ligne ' +data.length);
                $('#loader').fadeOut();
            });

        });
    </script>
@endsection
{{--@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script>
          $('#rec').DataTable({
              "language": {
                  "lengthMenu": "Afficher _MENU_ enregistrements par page",
                  "zeroRecords": "Rien n'a été trouvé - désolé",
                  "info": "Afficher la page _PAGE_ de _PAGES_",
                  "infoEmpty": "Aucun dossier disponible",
                  "processing":     "Traitement...",
                  "search":         "Recherche:",
                  "infoFiltered": "(filtré de _MAX_ total des enregistrements)",
                  "paginate": {
                      "first":      "Premier",
                      "last":       "Dernier",
                      "next":       "Suivant",
                      "previous":   "Précédent"
                  },
              },
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('chefagence.getagencerenct1') }}'
            },
            columns: [
                {data: 'matricule_aej', orderable: false, searchable: false},
                {data: 'nomprenom' , orderable: false, searchable: false},
                {data: 'sexe' , orderable: false, searchable: false},
                {data: 'lieudereisdence', orderable: false, searchable: false},
                {data: 'diplome', orderable: false, searchable: false},
                {data: 'dureerencontre', orderable: false, searchable: false},
                {data: 'dateprochainrdv', orderable: false, searchable: false},
                {data: 'axetravail', orderable: false, searchable: false},
                {data: 'conseillerreferent', orderable: false, searchable: false},
            ]
        });
    </script>
@endsection--}}
