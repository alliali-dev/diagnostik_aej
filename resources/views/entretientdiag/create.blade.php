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
                                    <form id="videoForm" action="{{ route('entretient.store') }}" class="icons-tab-steps wizard-circle"
                                          method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-info"></i>PROFIL DE L'USAGER</h6>
                                        <fieldset>
                                            <div class="row">
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
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="matriculeaej">Nom et Prenom</label>
                                                        <input type="text" name="nomprenom" id="nomprenom" placeholder="numero aej" class="form-control" required readonly="">
                                                    </div>
                                                </div>
                                            </div>
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
                                                        <label for="contact" style="font-size: large;">Maîtrise de l'outils de recherche d'emploi</label>
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
                                                        <label for="lieudereisdence" style="font-size: large;">Connaissance des exigence du marché</label>
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
                                                        <label for="diplome" style="font-size: large;">Dépôtde dossier en entreprise</label>
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
                            <div id="result" style="display: none;" class="text-center text-success">Importation effectue avec succees</div>

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
                    var matriculeaej = $('#matriculeaej').val();

                    if (matriculeaej.length > 11) {
                        $.ajax({
                            url:"http://localhost/diag_api/public/api/"+ matriculeaej,
                            type: 'get',
                            dataType: "json",
                            data: {
                                _token: "{{ csrf_token() }}",
                                search: matriculeaej
                            },success: function( data ) {
                                $('#loader').fadeOut();
                                $('#result').fadeIn();
                                $('#close').fadeIn();
                                $('#aej_ok').hide();
                                $('#return').hide();

                                $('#matriculeaej').val(data[0].label);
                                $('#matricule_aej').val(data[0].label);
                                $('#sexe').val(data[0].sexe);
                                $('#sexe_db').val(data[0].sexe);
                                $('#datenaissance').val(data[0].datenaissance);
                                $('#datenaissance_db').val(data[0].datenaissance);
                                $('#age').val(data[0].age);
                                $('#age_db').val(data[0].age);
                                $('#naturepiece').val(data[0].typepieceidentite);
                                $('#naturepiece_db').val(data[0].typepieceidentite);
                                $('#npiece').val(data[0].numerocni);
                                $('#npiece_db').val(data[0].numerocni);
                                $('#nationalite').val(data[0].nationalite);
                                $('#nationalite_db').val(data[0].nationalite);
                                $('#contact').val(data[0].telephone);
                                $('#contact_db').val(data[0].telephone);
                                $('#diplome').val(data[0].diplome);
                                $('#diplome_db').val(data[0].diplome);
                                $('#niveaudetude').val(data[0].niveauetude);
                                $('#niveaudetude_db').val(data[0].niveauetude);
                                $('#nomprenom').val(data[0].nomprenom);
                                // $("#addAej").modal('hide');

                            },error: function (jqXHR, exception) {
                                alert('reessayer svp !!!');
                                $('#loader').fadeOut();
                            }
                        });
                    }
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
