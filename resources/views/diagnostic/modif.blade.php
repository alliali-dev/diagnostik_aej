@extends('layouts.master')

@section('title') Formulaire d'édition @endsection
@section('content')

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
                                    <div class="tab-content layout-row">
                                        <div class="tab-pane layout-cell active" id="tabs1498-tab-01661944692659">
                                            <form action="" method="post">
                                                <div class="field-section">
                                                    <h4>Détail demandeur</h4>

                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="datedebutchomage">
                                                        <label for="">
                                                            Date début chomage
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="field-datepicker">
                                                            <!-- Date -->
                                                            <div class="input-with-icon right-align">
                                                                <i class="icon icon-calendar-o"></i>
                                                                <input type="date" id="" name="datedebutchomage" value="{{ $demandeur_edit->datedebutchomage }}" class="form-control align-right">
                                                            </div>

                                                            <!-- Data locker -->
                                                         {{--   <input type="hidden" name="datedebutchomage" id="datedebutchomage" value="" data-datetime-value="">--}}

                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="motifinscription" id="motifinscription-group">
                                                        <label for="motifinscription">
                                                            Motif inscription
                                                        </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="">
                                                            <!-- Dropdown -->
                                                            <select id="motifinscription" name="motifinscription" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="false">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->motifinscription as $motifinscription)
                                                                    <option value="{{$motifinscription->id}}">{{$motifinscription->libelle}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="typesituationhandicap" id="typesituationhandicap-group">
                                                        <label for="typesituationhandicap">
                                                            Type situation handicap
                                                        </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypesituationhandicap-typesituationhandicap">
                                                            <!-- Dropdown -->
                                                            <select id="typesituationhandicap" name="typesituationhandicap" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->typesituationhandicap as $typesituationhandicap)
                                                                    <option value="{{$typesituationhandicap->id}}">{{$typesituationhandicap->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                         <div class="form-group  text-field span-right col-6" data-field-name="handicapdemandeur" id="handicapdemandeur-group"><label for="handicapdemandeur">
                                                            Handicap demandeur
                                                        </label>

                                                        <!-- Text -->
                                                        <input type="text" name="handicapdemandeur" id="handicapdemandeur" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left  col-6 " data-field-name="categoriedemandeur" id="categoriedemandeur-group"><label for="categoriedemandeur">
                                                            Catégorie demandeur </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formCategoriedemandeur-categoriedemandeur">
                                                            <!-- Dropdown -->
                                                            <select id="categoriedemandeur" name="categoriedemandeur" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->categoriedemandeur as $categoriedemandeur)
                                                                  <option value="{{$categoriedemandeur->id}}">{{$categoriedemandeur->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6 " data-field-name="conseilleremploi" id="conseilleremploi-group"><label for="conseilleremploi">
                                                            Conseiller emploi </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formConseilleremploi-conseilleremploi">
                                                            <!-- Dropdown -->
                                                            <select id="conseilleremploi" name="conseilleremploi" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6" data-field-name="nocnps" id="nocnps-group">
                                                        <label for="nocnps">
                                                            Numéro CNPS
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="nocnps" id="nocnps" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                    <div class="form-group text-field span-right col-6"></div>
                                                </div>
                                                <div class="form-group  partial-field span-right   " data-field-name="ancienphoto" id="ancienphoto-group"></div>
                                                <div class="form-group  section-field span-full" data-field-name="etatcivil" id="etatcivil-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Infos état civil</h4>

                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="datenaissance" id="datenaissance-group">
                                                        <label for="datenaissance">
                                                            Date naissance
                                                        </label>
                                                        <!-- Widget -->
                                                        <div id="DatePicker-formDatenaissance-datenaissance" class="field-datepicker" data-control="datepicker" data-mode="date" data-show-week-number="" data-disposable="">
                                                            <!-- Date -->
                                                            <div class="input-with-icon right-align">
                                                                <i class="icon icon-calendar-o"></i>
                                                                <input type="text" value="{{ $demandeur_edit->datenaissance }}" id="DatePicker-formDatenaissance-date-datenaissance" class="form-control align-right" autocomplete="off" data-datepicker="">
                                                            </div>
                                                            <!-- Data locker -->
                                                            {{--<input type="hidden" name="datenaissance" id="datenaissance" value="1986-03-26 00:00:00" data-datetime-value="">--}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="tlieunaissance" id="tlieunaissance-group"><label for="tlieunaissance">
                                                            Lieu naissance </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTlieunaissance-tlieunaissance">
                                                            <!-- Dropdown -->
                                                           <select name="tlieunaissance" class="form-control" data-placeholder="">
                                                                <option value="">sélectionnez</option>
                                                                @foreach($demandeur_parameter->commune as $commune)
                                                                    <option value="{{$commune->id}}">{{ $commune->nom }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="paysnationalite" id="paysnationalite-group">
                                                        <label for="paysnationalite">
                                                            Pays nationalité
                                                        </label>

                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formPaysnationalite-paysnationalite">
                                                            <!-- Dropdown -->
                                                            {!! Form::select('paysnationalite', $pays, $demandeur_edit->paysnationalite_id, ['class' => 'form-control select2-pays']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="sexe" id="sexe-group">
                                                        <label for="sexe">
                                                            Sexe
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formSexe-sexe">
                                                            {!! Form::select('sexe_id', $sexes, $demandeur_edit->sexe_id, ['class' => 'form-control select2-sexe']) !!}
                                                            <!-- Dropdown -->
                                                           {{-- <select id="sexe" name="sexe" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                --}}{{--{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']) !!}--}}{{--
                                                               @foreach($demandeur_parameter->sexe as $sexe)
                                                                    <option value="{{$sexe->id}}">{{ $sexe->libelle }}</option>
                                                                @endforeach--}}{{--
                                                           </select>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="situationmatrimoniale" id="situationmatrimoniale-group"><label for="situationmatrimoniale">
                                                            Situation matrimoniale </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formSituationmatrimoniale-situationmatrimoniale">
                                                            <!-- Dropdown -->
                                                            <select id="situationmatrimoniale" name="situationmatrimoniale" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->situationamatrimoniale as $situationamatrimoniale)
                                                                    <option value="{{$situationamatrimoniale->id}}">{{$situationamatrimoniale->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="typepieceidentite" id="typepieceidentite-group">
                                                        <label for="typepieceidentite">
                                                            Type pièce identité
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypepieceidentite-typepieceidentite">
                                                            <!-- Dropdown -->
                                                            <select id="typepieceidentite" name="typepieceidentite" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->typepieceidentite as $typepieceidentite)
                                                                    <option value="{{$typepieceidentite->id}}">{{$typepieceidentite->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group text-field span-right col-6" data-field-name="numerocni" id="numerocni-group">
                                                        <label for="numerocni">
                                                            Numéro de pièce
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" value="{{ $demandeur_edit->numerocni }}" name="numerocni" id="numerocni" placeholder="" class="form-control" autocomplete="off" maxlength="255" required="">
                                                    </div>
                                                    <div class="form-group widget-field span-right col-6"></div>
                                                </div>
                                                <div class="form-group  section-field span-full" data-field-name="localisation" id="localisation-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Localisation</h4>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6" data-field-name="divisionregionale" id="divisionregionale-group">
                                                        <label for="divisionregionale">
                                                            Division régionale AEJ
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="divisionregionale" id="divisionregionale" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255" disabled="disabled">
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="paysresidence" id="paysresidence-group">
                                                        <label for="paysresidence">
                                                            Pays residence
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formPaysresidence-paysresidence">
                                                            <!-- Dropdown -->
                                                            <select id="paysresidence" name="paysresidence" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->pays as $pays)
                                                                    <option value="{{$pays->id}}">{{$pays->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="villeresidence" id="villeresidence-group">
                                                        <label for="villeresidence">
                                                            Ville residence
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formVilleresidence-villeresidence">
                                                            <!-- Dropdown -->
                                                            <select id="villeresidence" name="villeresidence" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->ville as $ville)
                                                                    <option value="$ville->id">{{$ville->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="agencecnps" id="agencecnps-group">
                                                        <label for="agencecnps">
                                                            Agence CNPS
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formAgencecnps-agencecnps">
                                                            <!-- Dropdown -->
                                                            <select id="agencecnps" name="agencecnps" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->agencecnps as $agencecnps)
                                                                    <option value="{{$agencecnps->id}}">{{$agencecnps->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="tlieuhabitation" id="tlieuhabitation-group">
                                                        <label for="tlieuhabitation">
                                                            Lieu Habitation
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTlieuhabitation-tlieuhabitation">
                                                            <!-- Dropdown -->
                                                            <select id="tlieuhabitation" name="tlieuhabitation" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->ville as $ville)
                                                                    <option value="$ville->id">{{$ville->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group widget-field col-6"></div>
                                                </div>
                                                <div class="form-group  section-field span-full" data-field-name="filiation" id="filiation-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Filiation</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6" data-field-name="nomdupere" id="nomdupere-group">
                                                        <label for="nomdupere">
                                                            Nom et prénoms du père
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="nomdupere" id="nomdupere" value="{{ $demandeur_edit->nomdupere }}" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                    <div class="form-group  text-field span-right col-6" data-field-name="nomdelamere" id="nomdelamere-group">
                                                        <label for="nomdelamere">
                                                            Nom et prénoms de la mère
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="nomdelamere" id="nomdelamere" value="{{ $demandeur_edit->nomdelamere }}" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                </div>
                                                <div class="form-group  section-field span-full" data-field-name="section2" id="section2-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Formation</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="niveauetude" id="niveauetude-group">
                                                        <label for="niveauetude">
                                                            Niveau etude
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="niveauetude">
                                                            <!-- Dropdown -->
                                                            <select id="niveauetude" name="niveauetude" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->niveauetude as $niveauetude)
                                                                    <option value="{{$niveauetude->id}}">{{$niveauetude->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="diplome" id="diplome-group">
                                                        <label for="diplome">
                                                            Diplome
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formDiplome-diplome">
                                                            <!-- Dropdown -->
                                                            <select id="diplome" name="diplome" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->diplome as $diplome)
                                                                    <option value="{{$diplome->id}}">{{$diplome->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="paysdiplome" id="paysdiplome-group">
                                                        <label for="paysdiplome">
                                                            Pays diplome
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formPaysdiplome-paysdiplome">
                                                            <!-- Dropdown -->
                                                            <select id="paysdiplome" name="paysdiplome" class="form-control custom-select select2--accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->pays as $pays)
                                                                    <option value="{{$pays->id}}">{{$pays->nom}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  text-field span-right col-6" data-field-name="etablissementfrequente" id="etablissementfrequente-group">
                                                        <label for="etablissementfrequente">
                                                            Etablissement fréquenté
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="etablissementfrequente" id="etablissementfrequente" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="typeenseignement" id="typeenseignement-group">
                                                        <label for="typeenseignement">
                                                            Type enseignement
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypeenseignement-typeenseignement">
                                                            <!-- Dropdown -->
                                                            <select id="typeenseignement" name="typeenseignement" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->typeenseignement as $typeenseignement)
                                                                    <option value="{{$typeenseignement->id}}">{{$typeenseignement->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="typeetablissement" id="typeetablissement-group">
                                                        <label for="typeetablissement">
                                                            Type établissement
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypeetablissement-typeetablissement">
                                                            <!-- Dropdown -->
                                                            <select id="typeetablissement" name="typeetablissement" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  section-field span-full" data-field-name="section3" id="section3-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Compétences</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="competence" id="competence-group">
                                                        <label for="competence">
                                                            Competence
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formCompetence-competence">
                                                            <!-- Dropdown -->
                                                            <select id="competence" name="competence" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6 " data-field-name="specialite" id="specialite-group">
                                                        <label for="specialite">
                                                            Specialite
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formSpecialite-specialite">
                                                            <!-- Dropdown -->
                                                            <select id="specialite" name="specialite" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->specialite as $specialite)
                                                                    <option value="{{$specialite->id}}">{{$specialite->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  number-field span-left col-6" data-field-name="nombreexperience" id="nombreexperience-group">
                                                        <label for="nombreexperience">
                                                            durée d'expérience
                                                        </label>
                                                        <!-- Number -->
                                                        <input type="number" step="any" name="nombreexperience" id="nombreexperience" value="{{ $demandeur_edit->nombreexperience }}" placeholder="" class="form-control" autocomplete="off" pattern="-?\d+(\.\d+)?" maxlength="255">
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6" data-field-name="uniteexperience" id="uniteexperience-group">
                                                        <label for="uniteexperience">
                                                            Unité durée
                                                        </label>
                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formUniteexperience-uniteexperience">
                                                            <!-- Dropdown -->
                                                            <select id="uniteexperience" name="uniteexperience" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                @foreach ($demandeur_parameter->uniteexperience as $uniteexperience)
                                                                   <option value="{{$uniteexperience->id}}">{{$uniteexperience->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6" data-field-name="expertise" id="expertise-group">
                                                        <label for="expertise">
                                                            Expertise
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="expertise" id="expertise" value="{{ $demandeur_edit->expertise }}" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                    <div class="form-group  widget-field span-left  col-6 " data-field-name="curriculum" id="curriculum-group">
                                                        <label for="curriculum">
                                                            cv
                                                        </label>
                                                        <input type="file" class="form-control">
                                                    </div>
                                                    <div class="d-flex">
                                                        <input type="submit" value="Valider" class="form-control bg-dark text-white m-25">
                                                        <input type="reset" value="Annuler" class="form-control m-25">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.select2-sexe').select2();
            $('.select2-pays').select2();
        });
    </script>
@endsection
