@extends('layouts.master')

@section('title') Entretiens @endsection

@section('subTitle') faire l'entretien @endsection

@section('content')

    <!-- Form wizard with icon tabs section start -->
    <section id="icon-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form id="videoForm" action="{{ route('entretient.store') }}"
                                          class="icons-tab-steps wizard-circle"
                                          method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-info"></i>PROFIL DE L'USAGER</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="sexe">Sexe</label>
                                                        <input type="text" class="form-control" placeholder="sexe" id="sexe" name="demandeur[sexe]" disabled>
                                                        <input type="hidden" id="sexe_db" name="demandeur[sexe]">
                                                    </div>
                                                    <input type="hidden" id="nomprenom" name="demandeur[nomprenom]">
                                                    <input type="hidden" id="matricule_aej" name="demandeur[matricule_aej]">
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="datenaisance">Date naissance</label>
                                                        <input type="date" class="form-control" id="datenaissance" name="demandeur[datenaissance]" placeholder="date de naissance" disabled>
                                                        <input type="hidden" id="datenaissance_db" name="demandeur[datenaisance]">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="text" class="form-control" id="age" name="demandeur[age]" placeholder="age" disabled>
                                                        <input type="hidden" id="age_db" name="demandeur[age]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="naturepiece">Nature Piece</label>
                                                        <input type="text" name="demandeur[naturepiece]" id="naturepiece" placeholder="nature pieces" class="form-control" disabled>
                                                        <input type="hidden" id="naturepiece_db" name="demandeur[naturepiece]">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="numpiece">N° Piece</label>
                                                        <input type="text" name="demandeur[npiece]" id="npiece" placeholder="N° piece" class="form-control" disabled>
                                                        <input type="hidden" id="npiece_db" name="demandeur[npiece]">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nationalite">Nationalite</label>
                                                        <input type="text" name="demandeur[nationalite]" id="nationalite" placeholder="nationalite" class="form-control" disabled>
                                                        <input type="hidden" id="nationalite_db" name="demandeur[nationalite]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="contact">Contact</label>
                                                        <input type="text" name="demandeur[contact]" id="contact" placeholder="contact" class="form-control" disabled>
                                                        <input type="hidden" id="contact_db" name="demandeur[contact]">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="lieudereisdence">Lieu de residence habituel</label>
                                                        <select name="demandeur[lieudereisdence]" id="lieudereisdence" class="form-control">
                                                            <option value="">{{__('-- selectionner residence --')}}</option>
                                                            @foreach($communes as $item)
                                                                <option value="{{$item->nom}}">{{$item->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                    {{--<input type="text" name="demandeur[lieudereisdence]" id="lieudereisdence" placeholder="Lieu de Residence" class="form-control" required>
                                                    <input type="hidden" name="commune_id" id='agenceid' readonly>--}}
                                                    <!-- For displaying selected option value from autocomplete suggestion -->
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diplome">Diplôme</label>
                                                        <input disabled type="text" name="demandeur[diplome]" id="diplome" placeholder="Diplôme" class="form-control">
                                                        <input  type="hidden" name="demandeur[diplome]" id="diplome_db">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="specialitediplome">Spécialité du diplôme</label>
                                                        <select name="demandeur[specialitediplome]" id="specialitediplome" class="form-control">
                                                            <option value="">{{__('-- selectionner Spécialité --')}}</option>
                                                            @foreach($specialites as $item)
                                                                <option value="{{$item->libelle}}">{{$item->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                        {{--<input type="text" name="demandeur[specialitediplome]" id="specialitediplome" placeholder="Spécialité du diplôme" class="form-control">--}}
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="anneediplome">Année d'obtention du diplôme</label>
                                                        <select name="demandeur[anneediplome]" id="anneediplome" class="form-control">
                                                            <option value="">{{__('-- selectionner diplôme --')}}</option>
                                                            @foreach($data as $item)
                                                                <option value="{{$item['dateannee']}}">{{$item['dateannee']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="niveaudetude">Niveau d'etudes</label>
                                                        <select disabled name="demandeur[niveaudetude]" id="niveaudetude" class="form-control">
                                                            <option value="">{{__('-- selectionner Niveau --')}}</option>
                                                            @foreach($niveauetudes as $item)
                                                                <option value="{{$item->libelle}}">{{$item->libelle}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input  type="hidden" name="demandeur[niveaudetude]" id="niveaudetude_db">
                                                        {{-- <input type="text" name="demandeur[niveaudetude]"
                                                        id="niveaudetude" placeholder="Niveau d'etudes" class="form-control">--}}
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="sexe">Sexe</label>
                                                        <select name="sexe" id="sexe" class="form-control" readonly="">
                                                            <option value="MASCULIN">MASCULIN</option>
                                                            <option value="FEMININ">FEMININ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="sexe">Diplome</label>
                                                        <input type="text" name="diplome" id="diplome" placeholder="numero aej" class="form-control" required readonly="">
                                                        <input type="hidden" name="matriculeaej" id="matricule_aej" class="form-control" required readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="matriculeaej">Nom et Prenom</label>
                                                        <input type="text" name="nomprenom" id="nomprenom" placeholder="numero aej" class="form-control" required readonly="">
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="niveauformation" style="font-size: large;">Niveau de Formation</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="niveauformaion" id="niveauformaion" value="non scolarisee" checked>&nbsp;&nbsp;&nbsp;non scolarisée
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="niveauformaion" id="niveauformaion" value="primaire">&nbsp;&nbsp;&nbsp;Primaire
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="niveauformaion" id="niveauformaion" value="secondaire">&nbsp;&nbsp;&nbsp;Secondaire
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="niveauformaion" id="niveauformaion" value="superieur">&nbsp;&nbsp;&nbsp;Superieur
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="niveauexperience" style="font-size: large;">Niveau d'expérience</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="niveauexperience" id="niveauexperience" value="0 à 6 mois" checked>&nbsp;&nbsp;&nbsp;0 à 6 mois
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="niveauexperience" id="niveauexperience" value="6 mois à 1 an">&nbsp;&nbsp;&nbsp;6 mois à 1 an
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="niveauexperience" id="niveauexperience" value="1 à 2 ans">&nbsp;&nbsp;&nbsp;1 à 2 ans
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="niveauexperience" id="niveauexperience" value="2 ans et plus">&nbsp;&nbsp;&nbsp;2 ans et plus
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="datenaisance" style="font-size: large;">Adéquation formation expérience</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="adeqormaexper" id="adeqormaexper" value="Médiocre" checked>&nbsp;&nbsp;&nbsp;Médiocre
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adeqormaexper" id="adeqormaexper" value="Passable">&nbsp;&nbsp;&nbsp;Passable
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adeqormaexper" id="adeqormaexper" value="Assez bien">&nbsp;&nbsp;&nbsp;Assez bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adeqormaexper" id="adeqormaexper" value="Bien">&nbsp;&nbsp;&nbsp;Bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adeqormaexper" id="adeqormaexper" value="Très bien">&nbsp;&nbsp;&nbsp;Très bien
                                                        </label>
                                                    </div>
                                                </div>

                                            </div><br><br>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="datenaisance" style="font-size: large;">Connaissance du métier / activité</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="conmetieractiv" id="conmetieractiv" value="Médiocre" checked>&nbsp;&nbsp;Médiocre
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conmetieractiv" id="conmetieractiv" value="Passable">&nbsp;&nbsp;Passable
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conmetieractiv" id="conmetieractiv" value="Assez bien">&nbsp;&nbsp;Assez bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conmetieractiv" id="conmetieractiv" value="Bien">&nbsp;&nbsp;Bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conmetieractiv" id="conmetieractiv" value="Très bien">&nbsp;&nbsp;Très bien
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="numpiece" style="font-size: large;">Adéquation formation métier / activité</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="adqformmetieractiv" id="adqformmetieractiv" value="Médiocre" checked>&nbsp;&nbsp;Médiocre
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqformmetieractiv" id="adqformmetieractiv" value="Passable">&nbsp;&nbsp;Passable
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqformmetieractiv" id="adqformmetieractiv" value="Assez bien">&nbsp;&nbsp;Assez bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqformmetieractiv" id="adqformmetieractiv" value="Bien">&nbsp;&nbsp;Bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqformmetieractiv" id="adqformmetieractiv" value="Très bien">&nbsp;&nbsp;Très bien
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nationalite" style="font-size: large;">Adéquation expérience métier / activité</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="adqexpmetieractiv" id="adqexpmetieractiv" value="Médiocre" checked>&nbsp;&nbsp;&nbsp;Médiocre
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqexpmetieractiv" id="adqexpmetieractiv" value="Passable">&nbsp;&nbsp;&nbsp;Passable
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqexpmetieractiv" id="adqexpmetieractiv" value="Assez bien">&nbsp;&nbsp;&nbsp;Assez bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqexpmetieractiv" id="adqexpmetieractiv" value="Bien">&nbsp;&nbsp;&nbsp;Bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="adqexpmetieractiv" id="adqexpmetieractiv" value="Très bien">&nbsp;&nbsp;&nbsp;Très bien
                                                        </label>
                                                    </div>
                                                </div>
                                            </div><br><br><br>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="contact" style="font-size: large;">Maîtrise de l'outil de recherche d'emploi</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="maitoutrechempl" id="maitoutrechempl" value="Médiocre" checked>&nbsp;&nbsp;&nbsp;Médiocre
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="maitoutrechempl" id="maitoutrechempl" value="Passable">&nbsp;&nbsp;&nbsp;Passable
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="maitoutrechempl" id="maitoutrechempl" value="Assez bien">&nbsp;&nbsp;&nbsp;Assez bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="maitoutrechempl" id="maitoutrechempl" value="Bien">&nbsp;&nbsp;&nbsp;Bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="maitoutrechempl" id="maitoutrechempl" value="Très bien">&nbsp;&nbsp;&nbsp;Très bien
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="lieudereisdence" style="font-size: large;">Connaissance des exigences du marché</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="conexigmarch" id="conexigmarch" value="Médiocre" checked>&nbsp;&nbsp;&nbsp;Médiocre
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conexigmarch" id="conexigmarch" value="Passable">&nbsp;&nbsp;&nbsp;Passable
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conexigmarch" id="conexigmarch" value="Assez bien">&nbsp;&nbsp;&nbsp;Assez bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conexigmarch" id="conexigmarch" value="bien">&nbsp;&nbsp;&nbsp;Bien
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="conexigmarch" id="conexigmarch" value="Très bien">&nbsp;&nbsp;&nbsp;Très bien
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diplome" style="font-size: large;">Dépôt de dossier en entreprise</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="depdossent" id="depdossent" value="pas du tout" checked>&nbsp;&nbsp;&nbsp;Pas du tout
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="depdossent" id="depdossent" value="souvent">&nbsp;&nbsp;&nbsp;Souvent
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="depdossent" id="depdossent" value="régulièrement">&nbsp;&nbsp;&nbsp;Régulièrement
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addAej" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white" id="myModalLabel16">Entrez n° AEJ</h4>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>
                    <div class="modal-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="matriculeaej">N° AEJ</label>
                                <input type="text" name="matriculeaej" id="matriculeaej" placeholder="numero aej" class="form-control" required>
                            </div>
                            <div id="loader" class="text-center" style="display: none;">
                            <!--img src="{{ asset('img/loader_squares.gif') }}" alt="Loader"-->
                                <div class="spinner-border" role="status" style="color: royalblue;">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div id="result" style="display: none;" class="text-center text-success"><strong>Importation réalisée avec succès</strong></div>
                            <div id="resulterror" style="display: none;" class="text-center text-warning"><strong>Numéro existe déjà</strong></div>
                            <div id="resulterrorformat" style="display: none;" class="text-center text-warning"><strong>Format non-conforme</strong></div>

                            <!--form control-->
                            <div class="form-group text-right mb-0">
                                <button type="button" id="close" style="display: none;" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                                <a class="btn btn-warning" id="return" href="{{route('home')}}">retour</a>
                                <button type="button" id="aej_ok" class="btn btn-success">ok</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form wizard with icon tabs section end -->

@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{asset('jqueryui/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('jqueryui/jquery-ui.min.js')}}" type="text/javascript"></script>

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/wizard-steps.js') }}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.plyr.io/3.5.3/plyr.js"></script>
    <script src="{{ asset('js/optin-player.js') }}"></script>
    <script src="{{ asset('js/optin-product.js') }}"></script>
    <script>
        $(function() {
                $("#addAej").modal(
                    {
                        keyboard: false,
                        backdrop:'static'
                    },'show');
                var test = $("#aej_ok");
                console.log(test);
                $("#aej_ok").click(function() {
                    $('#loader').fadeIn();
                    $('#resulterror').fadeOut();
                    $('#resulterrorformat').fadeOut();

                    var matriculeaej = $('#matriculeaej').val();

                    $.ajax({
                        url: "{{ route('verif.aejentretien') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            matriculeaej: matriculeaej
                        },success: function( data ) {
                            console.log(data);
                            if(data.entretiendiag == null){
                                /*if (matriculeaej.length > 11) {*/
                                    $.ajax({
                                        url:"{{ route('api') }}",
                                        type: 'get',
                                        dataType: "json",
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                            matricule_aej: matriculeaej
                                        },success: function( array ) {
                                            //console.log(array);
                                            $('#loader').fadeOut();
                                            $('#result').fadeIn();
                                            $('#close').fadeIn();
                                            $('#aej_ok').hide();
                                            $('#return').hide();
                                            $('#matriculeaej').val(array[0].label);
                                            $('#matricule_aej').val(array[0].label);
                                            $('#sexe').val(array[0].sexe);
                                            $('#sexe_db').val(array[0].sexe);
                                            $('#datenaissance').val(array[0].datenaissance);
                                            $('#datenaissance_db').val(array[0].datenaissance);
                                            $('#age').val(array[0].age);
                                            $('#age_db').val(array[0].age);
                                            $('#lieudereisdence').val(array[0].domicile);
                                            $('#naturepiece').val(array[0].typepieceidentite);
                                            $('#naturepiece_db').val(array[0].typepieceidentite);
                                            $('#npiece').val(array[0].numerocni);
                                            $('#npiece_db').val(array[0].numerocni);
                                            $('#nationalite').val(array[0].nationalite);
                                            $('#nationalite_db').val(array[0].nationalite);
                                            $('#contact').val(array[0].telephone);
                                            $('#contact_db').val(array[0].telephone);
                                            $('#diplome').val(array[0].diplome);
                                            $('#diplome_db').val(array[0].diplome);
                                            $('#niveaudetude').val(array[0].niveauetude);
                                            $('#niveaudetude_db').val(array[0].niveauetude);
                                            $('#nomprenom').val(array[0].nom +' '+ array[0].prenom);
                                        },error: function (jqXHR, exception) {
                                            alert('reessayer svp !!!');
                                            $('#loader').fadeOut();
                                        }
                                    });
                                /*}else{
                                    $('#loader').fadeOut();
                                    $('#resulterrorformat').fadeIn();
                                }*/
                            }else{
                                $('#loader').fadeOut();
                                $('#resulterror').fadeIn();

                            }
                           console.log();
                        },error: function (jqXHR, exception) {

                        }
                    });

                });

            if ($('#videoSource').val() === 'youtube') {
                $('#btnFindVideo').fadeIn('fast');
            }

            // Resize the offers slider on window's resize
            $(window).on('resize', function() {
                makeResizing()
            });

            $('#btnSearch').on('click', function() {
                $('#results').empty();
                $('.loader').fadeIn('fast');
                $.ajax({
                    url: '',
                    type: 'post',
                    dataType: 'JSON',
                    data: {
                        _token: '{{ csrf_token() }}',
                        filter: $('#filter').val(),
                        search: $('#search').val()
                    }
                }).done(function (data) {
                    $('.loader').fadeOut('fast');
                    $.each(data, function(i){
                        $('#results').append(`
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid"
                                         src="${data[i].image}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">${data[i].title}</h4>
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="icon-view mr-2">
                                                <i class="feather icon-eye text-success font-medium-5 align-middle"></i>
                                                <span>${data[i].views}</span>
                                            </div>
                                            <div class="icon-comment mr-2">
                                                <i class="feather icon-message-square font-medium-5 align-middle text-primary"></i>
                                                <span>${data[i].comments}</span>
                                            </div>
                                            <div class="icon-like mr-2">
                                                <i class="feather icon-thumbs-up text-danger font-medium-5 align-middle"></i>
                                                <span>${data[i].likes}</span>
                                            </div>
                                        </div>
                                        <button type="button" data-id="${data[i].link}"
                                            class="btn gradient-light-primary btn-block mt-2 waves-effect waves-light select-video">
                                            Select Video
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    });
                }).fail(function (error) {
                    console.log(error)
                });
            });

            $(document).on('click','.select-video', function () {
                var url = $(this).data('id');
                $('#searchVideo').modal('hide');
                $('#videoURL').val(url).trigger('change');
            });
        });

        function toggleOffers(offer_type) {
            if (offer_type == 'Custom') {
                $('.amazon-seed').fadeOut('fast');
                $('.customOffers').fadeIn('fast');
                $(".add-slide").fadeIn('fast');
                if( ! $('#CampaignId').length ) {
                    $('#slides').empty();
                }
            } else if (offer_type == 'Amazon') {
                $('.amazon-seed').fadeIn('fast');
                if( ! $('#CampaignId').length ) {
                    $('#slides').empty();
                }
            } else if (offer_type == 'Ebay') {
                $('.amazon-seed').fadeIn('fast');
                if( ! $('#CampaignId').length ) {
                    $('#slides').empty();
                }
            } else if (offer_type == 'Walmart') {
                $('.amazon-seed').fadeIn('fast');
                if( ! $('#CampaignId').length ) {
                    $('#slides').empty();
                }
            } else if (offer_type == 'Bestbuy') {
                $('.amazon-seed').fadeIn('fast');
                if( ! $('#CampaignId').length ) {
                    $('#slides').empty();
                }
            } else if (offer_type == 'Aliexpress') {
                $('.amazon-seed').fadeIn('fast');
                if( ! $('#CampaignId').length ) {
                    $('#slides').empty();
                }
            }
        }

        function makeResizing() {
            var plyr = $('.plyr');
            $('.overlay').css({
                height : plyr.height() + 'px'
            });
            $('.offer-info').css({
                height : plyr.height() - 40 + 'px'
            });
            $('.offers, .offer, .slick-prev, .slick-next').css({
                height : plyr.width() - (plyr.width() * 85.5) / 100 + 'px',
            });
        }

        function getThumb(url, size) {
            if (url === null) {
                return '';
            }
            size    = (size === null) ? 'big' : size;
            results = url.match('[\\?&]v=([^&#]*)');
            video   = (results === null) ? url : results[1];

            if (size === 'small') {
                return 'http://img.youtube.com/vi/' + video + '/2.jpg';
            }
            return 'http://img.youtube.com/vi/' + video + '/0.jpg';
        }

        function getYoutubeID(url) {
            var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
            var match = url.match(regExp);
            return (match&&match[7].length==11)? match[7] : '';
        }
    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/wizard.css') }}">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.3/plyr.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/player.css') }}">
    <style>
        /* SLICK AND OFFERS SLIDES */
        #btnFindVideo {
            display: none;
        }

        .video-container {
            position: relative;
            margin: 0 auto;
            overflow: hidden;
            background: #000;
        }

        .player-brand {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 130px;
            height: 35px;
            z-index: 3;
        }

        .player-brand img {
            max-width: 100%;
            max-height: 100%;
        }

        .sharing-buttons {
            position: absolute;
            top: 5px;
            right: 10px;
            width: 35px;
            text-align: center;
            z-index: 3;
        }

        .sharing-buttons a {
            display: none;
        }

        .sharing-buttons a span {
            margin-bottom: 5px;
        }

        .sharing-buttons a:hover {
            text-decoration: none;
        }

        .sharing-buttons .facebook i {
            background: #428bca;
            border-radius: 100%;
        }

        .sharing-buttons .twitter i {
            background: #1da1f3;
            border-radius: 100%;
        }

        .sharing-buttons .pinterest i {
            background: #cb2027;
            border-radius: 100%;
        }

        .sharing-buttons .linkedin i {
            background: #007bb6;
            border-radius: 100%;
        }

        .offer-info {
            display: none;
            position: absolute;
            top: 20px;
            width: 100%;
            z-index: 5;
        }

        .offer-info i.fa.fa-close {
            background: #FFF;
            float: right;
            border: 1px solid #73879C;
            border-radius: 50%;
            padding: 2px 4px;
            margin-top: -25px;
            margin-right: -30px;
            cursor: pointer;
        }

        .offer-content {
            padding: 20px;
            width: 75%;
            margin: 0 auto;
            background-color: #fff;
        }

        .optin-offer {
            display: block;
            position: relative;
            padding: 10px;
        }

        .optin-offer img {
            display: flex;
            flex-flow: column wrap;
            width: 25%;
            height: 140px;
            float: left;
        }

        .optin-offer .right-block {
            display: flex;
            flex-flow: column wrap;
            justify-content: space-between;
            align-content: space-between;
            width: 75%;
            height: 140px;
            padding: 0 10px;
            background-color: #fff;
        }

        .optin-offer .right-block .offer-title {
            position: relative;
            font-size: 16px;
            margin-top: 10px;
            color: #000
        }

        .optin-offer .right-block .offer-link {
            position: relative;
            bottom: 10px;
            font-size: 15px;
            font-weight: 600;
        }

        .brandLink, .brandImage {
            display: none;
        }


        .app-content .wizard > .actions > ul > li.disabled > a[href='#previous'] {
            display: none;
        }

    </style>
@endsection
