@extends('layouts.master')

@section('title') Details @endsection

@section('subTitle') Afficher demandeur @endsection

@section('content')
    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">

            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 float-left">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('chefagence.rencontre1') }}" class="btn btn-outline-warning btn-rounded">&larr; Retour</a>
                            </div>
                        </div>
                        <div class="mb-3 float-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button id="imprimer" class="btn btn-success btn-rounded">Imprimer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive-sm" id="target">
                    <table id="users-table" class="table table-hover table-striped">
                        <tbody class="">
                        <tr>
                            <th>Matricule AEJ</th>
                            <td class="text-left">{{$suivie->matricule_aej}}</td>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td class="text-left">{{$suivie->nomprenom}}</td>
                        </tr>
                        <tr>
                            <th>Sexe</th>
                            <td class="text-left">{{ $suivie->sexe }}</td>
                        </tr>
                        <tr>
                            <th>Date de creation</th>
                            <td class="text-left">{{$suivie->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Agence</th>
                            <td class="text-left">{{ \App\Models\Agence::find( session()->get('orig_agence'))->name }}</td>
                        </tr>
                        <tr>
                            <th>Conseiller Referent</th>
                            <td class="text-left">{{ App\Models\User::where('agence_id', session()->get('orig_agence'))->where('id',$suivie->user_id)->first()->name }}</td>
                        </tr>
                        </tbody>
                    </table>
                    {{--'dureerencontre','approche','typerencontre','modalite', 'status',
                            'axetravail','planaction','dateprochainrdv','observation',
                            'user_id', 'suivirencontre_id','agence_id', 'presencedemandeur'--}}
                    <table class="table" id="rec" style="width: 100%;">
                        <thead>
                        <tr>

                            <th>Type Rencontre</th>
                            <th>Modalite</th>
                            <th>Axe Travail</th>
                            <th>Approche Skill</th>
                            <th>Plan Action</th>
                            <th>Duree Rencontre</th>
                            <th>Date Rendez-Vous</th>
                            <th>Statut Entretien</th>
                            <th>Statut RDV</th>
                            <th>Date de Creation</th>
                        </tr>
                        </thead>
                        <tbody id="rencontreRow">
                        @forelse($rencontres as $item)
                            <tr>
                                <th>Rencontre {{ $item->typerencontre }}</th>
                                <th>{{ $item->modalite }}</th>
                                <th>{{ $item->axetravail }}</th>
                                <th>{{ $item->approche }}</th>
                                <th>{{ $item->planaction }}</th>
                                <th>{{ $item->dureerencontre }}</th>
                                <th>{{ \Carbon\Carbon::parse($item->dateprochainrdv)->format('M d, Y')}}</th>
                                @if($item->status)
                                    <th>
                                        <span class="badge badge-success">
                                            valide
                                        </span>
                                    </th>
                                @else
                                    <th>
                                        <span class="badge badge-warning">
                                            en cour
                                        </span>
                                    </th>
                                @endif
                                @if($item->findrdv)
                                    <th>
                                        <span class="badge badge-secondary">
                                            terminer
                                        </span>
                                    </th>
                                @endif
                                <th>{{  \Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</th>
                            </tr>
                        @empty
                            <td>Pas de donnee trouve</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>


@endsection
@section('js')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script>--}}
    <script src="{{ asset('js/jspdf.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var specialElementHandlers ={
                "#editor":function (element,renderer) {
                    return true;
                }
            }

            $('#imprimer').click(function () {
                var doc = new jsPDF('l', 'mm', [297, 210]);
                doc.fromHTML($("#target").get(0),15,15,{
                    "width" : 180,
                    "elementHandlers" : specialElementHandlers
                });
                //doc.setFont("courier", "italic");
                doc.setFontSize(8);
                doc.save('details-demandeur.pdf');
            });
        });

      /*  doc.fromHTML($('body').get(0), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });*/


    </script>
@endsection
