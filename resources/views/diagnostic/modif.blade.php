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
                                                                <input type="date" id="" class="form-control align-right" autocomplete="off" data-datepicker="">
                                                            </div>

                                                            <!-- Data locker -->
                                                            <input type="hidden" name="datedebutchomage" id="Form-field-DemandeurEmploiModel-datedebutchomage" value="" data-datetime-value="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="motifinscription" id="Form-field-DemandeurEmploiModel-motifinscription-group">
                                                        <label for="Form-field-DemandeurEmploiModel-motifinscription">
                                                            Motif inscription
                                                        </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-motifinscription" name="motifinscription" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="false">
                                                                <option value="">sélectionnez</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6" data-field-name="typesituationhandicap" id="Form-field-DemandeurEmploiModel-typesituationhandicap-group">
                                                        <label for="Form-field-DemandeurEmploiModel-typesituationhandicap">
                                                            Type situation handicap
                                                        </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypesituationhandicap-typesituationhandicap">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-typesituationhandicap" name="typesituationhandicap" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  text-field span-right col-6  " data-field-name="handicapdemandeur" id="Form-field-DemandeurEmploiModel-handicapdemandeur-group"><label for="Form-field-DemandeurEmploiModel-handicapdemandeur">
                                                            Handicap demandeur </label>


                                                        <!-- Text -->
                                                        <input type="text" name="handicapdemandeur" id="Form-field-DemandeurEmploiModel-handicapdemandeur" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left  col-6 " data-field-name="categoriedemandeur" id="Form-field-DemandeurEmploiModel-categoriedemandeur-group"><label for="Form-field-DemandeurEmploiModel-categoriedemandeur">
                                                            Catégorie demandeur </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formCategoriedemandeur-categoriedemandeur">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-categoriedemandeur" name="categoriedemandeur" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6   " data-field-name="conseilleremploi" id="Form-field-DemandeurEmploiModel-conseilleremploi-group"><label for="Form-field-DemandeurEmploiModel-conseilleremploi">
                                                            Conseiller emploi </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formConseilleremploi-conseilleremploi">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-conseilleremploi" name="conseilleremploi" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6  " data-field-name="nocnps" id="Form-field-DemandeurEmploiModel-nocnps-group">
                                                        <label for="Form-field-DemandeurEmploiModel-nocnps">
                                                            Numéro CNPS
                                                        </label>
                                                        <!-- Text -->
                                                        <input type="text" name="nocnps" id="Form-field-DemandeurEmploiModel-nocnps" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                    <div class="form-group text-field span-right col-6"></div>
                                                </div>
                                                <div class="form-group  partial-field span-right   " data-field-name="ancienphoto" id="Form-field-DemandeurEmploiModel-ancienphoto-group"></div>
                                                <div class="form-group  section-field span-full   " data-field-name="etatcivil" id="Form-field-DemandeurEmploiModel-etatcivil-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Infos état civil</h4>

                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="datenaissance" id="Form-field-DemandeurEmploiModel-datenaissance-group"><label for="Form-field-DemandeurEmploiModel-datenaissance">
                                                            Date naissance </label>


                                                        <!-- Widget -->

                                                        <div id="DatePicker-formDatenaissance-datenaissance" class="field-datepicker" data-control="datepicker" data-mode="date" data-show-week-number="" data-disposable="">

                                                            <!-- Date -->
                                                            <div class="input-with-icon right-align">
                                                                <i class="icon icon-calendar-o"></i>
                                                                <input type="text" id="DatePicker-formDatenaissance-date-datenaissance" class="form-control align-right" autocomplete="off" data-datepicker="">
                                                            </div>

                                                            <!-- Data locker -->
                                                            <input type="hidden" name="datenaissance" id="Form-field-DemandeurEmploiModel-datenaissance" value="1986-03-26 00:00:00" data-datetime-value="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="tlieunaissance" id="Form-field-DemandeurEmploiModel-tlieunaissance-group"><label for="Form-field-DemandeurEmploiModel-tlieunaissance">
                                                            Lieu naissance </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTlieunaissance-tlieunaissance">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-tlieunaissance" name="tlieunaissance" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="paysnationalite" id="Form-field-DemandeurEmploiModel-paysnationalite-group"><label for="Form-field-DemandeurEmploiModel-paysnationalite">
                                                            Pays nationalité </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formPaysnationalite-paysnationalite">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-paysnationalite" name="paysnationalite" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="sexe" id="Form-field-DemandeurEmploiModel-sexe-group"><label for="Form-field-DemandeurEmploiModel-sexe">
                                                            Sexe </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formSexe-sexe">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-sexe" name="sexe" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                <option selected="selected" value="1">MASCULIN</option>
                                                                <option value="2">FEMININ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="situationmatrimoniale" id="Form-field-DemandeurEmploiModel-situationmatrimoniale-group"><label for="Form-field-DemandeurEmploiModel-situationmatrimoniale">
                                                            Situation matrimoniale </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formSituationmatrimoniale-situationmatrimoniale">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-situationmatrimoniale" name="situationmatrimoniale" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                <option value="1">Marie(e)</option>
                                                                <option selected="selected" value="2">En concubinage</option>
                                                                <option value="3">Celibataire</option>
                                                                <option value="4">Veuf ou Veuve</option>
                                                                <option value="5">Divorce(e)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-left col-6 " data-field-name="typepieceidentite" id="Form-field-DemandeurEmploiModel-typepieceidentite-group"><label for="Form-field-DemandeurEmploiModel-typepieceidentite">
                                                            Type pièce identité </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypepieceidentite-typepieceidentite">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-typepieceidentite" name="typepieceidentite" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                <option selected="selected" value="1">CNI</option>
                                                                <option value="2">Attestation</option>
                                                                <option value="3">Passeport</option>
                                                                <option value="4">Permis de conduire</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="form-group  text-field span-right col-6 is-required  " data-field-name="numerocni" id="Form-field-DemandeurEmploiModel-numerocni-group"><label for="Form-field-DemandeurEmploiModel-numerocni">
                                                            Numéro de pièce </label>

                                                        <!-- Text -->
                                                        <input type="text" name="numerocni" id="Form-field-DemandeurEmploiModel-numerocni" value="C0071513137" placeholder="" class="form-control" autocomplete="off" maxlength="255" required="">
                                                    </div>
                                                    <div class="form-group widget-field span-right col-6"></div>
                                                </div>
                                                <div class="form-group  section-field span-full   " data-field-name="localisation" id="Form-field-DemandeurEmploiModel-localisation-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Localisation</h4>

                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6  " data-field-name="divisionregionale" id="Form-field-DemandeurEmploiModel-divisionregionale-group"><label for="Form-field-DemandeurEmploiModel-divisionregionale">
                                                            Division régionale AEJ </label>


                                                        <!-- Text -->
                                                        <input type="text" name="divisionregionale" id="Form-field-DemandeurEmploiModel-divisionregionale" value="YOPOUGON" placeholder="" class="form-control" autocomplete="off" maxlength="255" disabled="disabled">
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="paysresidence" id="Form-field-DemandeurEmploiModel-paysresidence-group"><label for="Form-field-DemandeurEmploiModel-paysresidence">
                                                            Pays residence </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formPaysresidence-paysresidence">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-paysresidence" name="paysresidence" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="villeresidence" id="Form-field-DemandeurEmploiModel-villeresidence-group"><label for="Form-field-DemandeurEmploiModel-villeresidence">
                                                            Ville residence </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formVilleresidence-villeresidence">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-villeresidence" name="villeresidence" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="agencecnps" id="Form-field-DemandeurEmploiModel-agencecnps-group"><label for="Form-field-DemandeurEmploiModel-agencecnps">
                                                            Agence CNPS </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formAgencecnps-agencecnps">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-agencecnps" name="agencecnps" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="tlieuhabitation" id="Form-field-DemandeurEmploiModel-tlieuhabitation-group"><label for="Form-field-DemandeurEmploiModel-tlieuhabitation">
                                                            Lieu Habitation </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTlieuhabitation-tlieuhabitation">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-tlieuhabitation" name="tlieuhabitation" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group widget-field col-6"></div>
                                                </div>
                                                <div class="form-group  section-field span-full   " data-field-name="filiation" id="Form-field-DemandeurEmploiModel-filiation-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Filiation</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6  " data-field-name="nomdupere" id="Form-field-DemandeurEmploiModel-nomdupere-group"><label for="Form-field-DemandeurEmploiModel-nomdupere">
                                                            Nom et prénoms du père </label>


                                                        <!-- Text -->
                                                        <input type="text" name="nomdupere" id="Form-field-DemandeurEmploiModel-nomdupere" value="Ani gbalou Félix" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                    <div class="form-group  text-field span-right col-6  " data-field-name="nomdelamere" id="Form-field-DemandeurEmploiModel-nomdelamere-group"><label for="Form-field-DemandeurEmploiModel-nomdelamere">
                                                            Nom et prénoms de la mère </label>


                                                        <!-- Text -->
                                                        <input type="text" name="nomdelamere" id="Form-field-DemandeurEmploiModel-nomdelamere" value="Gnepo zrohonon Martine" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                </div>
                                                <div class="form-group  section-field span-full   " data-field-name="section2" id="Form-field-DemandeurEmploiModel-section2-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Formation</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6   " data-field-name="niveauetude" id="Form-field-DemandeurEmploiModel-niveauetude-group"><label for="Form-field-DemandeurEmploiModel-niveauetude">
                                                            Niveau etude </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formNiveauetude-niveauetude">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-niveauetude" name="niveauetude" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="diplome" id="Form-field-DemandeurEmploiModel-diplome-group"><label for="Form-field-DemandeurEmploiModel-diplome">
                                                            Diplome </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formDiplome-diplome">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-diplome" name="diplome" class="form-control custom-select select2-accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="paysdiplome" id="Form-field-DemandeurEmploiModel-paysdiplome-group"><label for="Form-field-DemandeurEmploiModel-paysdiplome">
                                                            Pays diplome </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formPaysdiplome-paysdiplome">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-paysdiplome" name="paysdiplome" class="form-control custom-select select2--accessible" data-placeholder="" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  text-field span-right col-6  " data-field-name="etablissementfrequente" id="Form-field-DemandeurEmploiModel-etablissementfrequente-group"><label for="Form-field-DemandeurEmploiModel-etablissementfrequente">
                                                            Etablissement fréquenté </label>


                                                        <!-- Text -->
                                                        <input type="text" name="etablissementfrequente" id="Form-field-DemandeurEmploiModel-etablissementfrequente" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="typeenseignement" id="Form-field-DemandeurEmploiModel-typeenseignement-group"><label for="Form-field-DemandeurEmploiModel-typeenseignement">
                                                            Type enseignement </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypeenseignement-typeenseignement">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-typeenseignement" name="typeenseignement" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="typeetablissement" id="Form-field-DemandeurEmploiModel-typeetablissement-group"><label for="Form-field-DemandeurEmploiModel-typeetablissement">
                                                            Type établissement </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formTypeetablissement-typeetablissement">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-typeetablissement" name="typeetablissement" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>
                                                                <option value="1">EFQ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group  section-field span-full   " data-field-name="section3" id="Form-field-DemandeurEmploiModel-section3-group">
                                                    <!-- Section -->
                                                    <div class="field-section">
                                                        <h4>Compétences</h4>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  widget-field span-left col-6  " data-field-name="competence" id="Form-field-DemandeurEmploiModel-competence-group"><label for="Form-field-DemandeurEmploiModel-competence">
                                                            Competence </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formCompetence-competence">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-competence" name="competence" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6   " data-field-name="specialite" id="Form-field-DemandeurEmploiModel-specialite-group"><label for="Form-field-DemandeurEmploiModel-specialite">
                                                            Specialite </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formSpecialite-specialite">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-specialite" name="specialite" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  number-field span-left col-6  " data-field-name="nombreexperience" id="Form-field-DemandeurEmploiModel-nombreexperience-group"><label for="Form-field-DemandeurEmploiModel-nombreexperience">
                                                            durée d'expérience </label>


                                                        <!-- Number -->

                                                        <input type="number" step="any" name="nombreexperience" id="Form-field-DemandeurEmploiModel-nombreexperience" value="" placeholder="" class="form-control" autocomplete="off" pattern="-?\d+(\.\d+)?" maxlength="255">
                                                    </div>
                                                    <div class="form-group  widget-field span-right col-6  " data-field-name="uniteexperience" id="Form-field-DemandeurEmploiModel-uniteexperience-group"><label for="Form-field-DemandeurEmploiModel-uniteexperience">
                                                            Unité durée </label>


                                                        <!-- Widget -->
                                                        <div class="relation-widget" id="Relation-formUniteexperience-uniteexperience">
                                                            <!-- Dropdown -->
                                                            <select id="Form-field-DemandeurEmploiModel-uniteexperience" name="uniteexperience" class="form-control custom-select select2-accessible" data-placeholder="sélectionnez" data-disposable="data-disposable" tabindex="-1" aria-hidden="true">
                                                                <option value="">sélectionnez</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  text-field span-left col-6  " data-field-name="expertise" id="Form-field-DemandeurEmploiModel-expertise-group"><label for="Form-field-DemandeurEmploiModel-expertise">
                                                            Expertise </label>


                                                        <!-- Text -->
                                                        <input type="text" name="expertise" id="Form-field-DemandeurEmploiModel-expertise" value="" placeholder="" class="form-control" autocomplete="off" maxlength="255">
                                                    </div>
                                                    <div class="form-group  widget-field span-left  col-6 " data-field-name="curriculum" id="Form-field-DemandeurEmploiModel-curriculum-group"><label for="Form-field-DemandeurEmploiModel-curriculum">
                                                            cv </label>
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
