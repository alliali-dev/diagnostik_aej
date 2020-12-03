@extends('layouts.master')

@section('title') Diagnostic @endsection

@section('subTitle') Post-suivie @endsection

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
                                    <form id="videoForm" action="{{ route('diagnostik.store') }}" class="icons-tab-steps wizard-circle"
                                          method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="template" value="optin">
                                    @csrf
                                    <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-info"></i>Information Demandeur</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="sexe">Sexe</label>
                                                        <input type="text" class="form-control" placeholder="sexe" id="sexe" name="demandeur[sexe]">
                                                    </div>
                                                    <input type="hidden" id="nomprenom" name="demandeur[nomprenom]">
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="datenaisance">Date naissance</label>
                                                        <input type="text" class="form-control" id="datenaissance" name="demandeur[datenaissance]" placeholder="date de naissance">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="text" class="form-control" id="age" name="demandeur[age]" placeholder="age">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="naturepiece">Nature Piece</label>
                                                        <input type="text" name="demandeur[naturepiece]" id="naturepiece" placeholder="nature pieces" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="numpiece">N° Piece</label>
                                                        <input type="text" name="demandeur[npiece]" id="npiece" placeholder="N° piece" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nationalite">Nationalite</label>
                                                        <input type="text" name="demandeur[nationalite]" id="nationalite" placeholder="nationalite" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="contact">Contact</label>
                                                        <input type="text" name="demandeur[contact]" id="contact" placeholder="contact" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="lieudereisdence">Lieu de residence habituel</label>
                                                        <input type="text" name="demandeur[lieudereisdence]" id="lieudereisdence" placeholder="Lieu de Residence" class="form-control" required>
                                                        <input type="hidden" name="commune_id" id='agenceid' readonly>
                                                        <!-- For displaying selected option value from autocomplete suggestion -->
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diplome">Diplôme</label>
                                                        <input type="text" name="demandeur[diplome]" id="diplome" placeholder="Diplôme" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="specialitediplome">Spécialité du diplôme</label>
                                                        <input type="text" name="demandeur[specialitediplome]" id="specialitediplome" placeholder="Spécialité du diplôme" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="anneediplome">Année d'obtention du diplôme</label>
                                                            <select name="demandeur[anneediplome]" id="anneediplome" class="form-control">
                                                                @foreach($data as $item)
                                                                <option value="{{$item['dateannee']}}">{{$item['dateannee']}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="niveaudetude">Niveau d'etudes</label>
                                                        <input type="text" name="demandeur[niveaudetude]" id="niveaudetude" placeholder="Niveau d'etudes" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 2 -->
                                        <h6><i class="step-icon feather icon-settings"></i> Axe de travail</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col">
                                                        <div class="form-group">
                                                            <label for="title">Duree de la rencontre</label>
                                                            <input type="text" class="form-control" id="dureerencontre" name="rencontre[dureerencontre]" required>
                                                        </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-right mb-0">
                                                        <button type="button" id="start" class="btn btn-success">commencer</button>
                                                        <button type="button" id="stop" class="btn btn-warning">arreter</button>
                                                        <button type="button" id="init" class="btn btn-info">initialiser</button>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="approche">Avez vous entretenu le demandeur avec l'approche</label>
                                                        <select name="rencontre[approche]"  id="approche" class="form-control">
                                                            <option value="{{__('SOFT')}}">{{__('SOFT')}}</option>
                                                            <option value="{{__('SKILLS')}}">{{__('SKILLS')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="modalite">Modalite de prise en charge</label>
                                                        <select name="rencontre[modalite]" id="modalite" class="form-control">
                                                            <option value="{{__('ACCOMPAGNEMENT')}}">{{__('ACCOMPAGNEMENT')}}</option>
                                                            <option value="{{__('SUIVI')}}">{{__('SUIVI')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="modalite">Axe de travail</label>
                                                        <select name="rencontre[axetravail]" id="axetravail" class="form-control">
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
                                                            <textarea name="rencontre[planaction]" id="planaction" rows="3" class="form-control" required="">
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="observation">Observation</label>
                                                        <textarea name="rencontre[observation]" id="observation" rows="3" class="form-control" required="">
                                                        </textarea>
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
        <div class="modal fade" id="searchVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger white">
                        <h4 class="modal-title" id="myModalLabel16">Search Videos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-xl-5 col-md-6 col-sm-12">
                                <div class="form-label-group">
                                    <select class="form-control" id="filter">
                                        <option selected disabled>Search a video by</option>
                                        <option value="view">Most view</option>
                                        <option value="recent">Most recent</option>
                                    </select>
                                    <label for="first-name-column" class="sr-only">Video</label>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6 col-sm-12">
                                <div class="form-label-group">
                                    <input type="text" id="search" class="form-control"
                                           placeholder="Search youtube video"
                                           name="search-column">
                                    <label for="search-column" class="sr-only">Search</label>
                                </div>
                            </div>

                            <div class="col-xl-1 col-md-6 col-sm-12">
                                <button id="btnSearch" class="btn btn-primary waves-effect waves-light">
                                    Search
                                </button>
                            </div>
                        </div>

                        <div id="finder" style="text-align: center;">
                            <img class="loader" src="{{ asset('img/loader_squares.gif') }}" alt="Loader" style="display: none;">
                            <div id="results" class="row"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form wizard with icon tabs section end -->

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
                        <!--form control-->
                        <div class="form-group text-right mb-0">
                        <a class="btn btn-warning" href="{{route('home')}}">retour</a>
                            <button type="button" id="aej_ok" class="btn btn-success">ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <script type="text/javascript" src="https://daokun.webs.com/jquery.stopwatch.js"></script>
    {{--gestion des chronometre--}}
    <script>
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
                    console.log(heure);
                    console.log(minute);
                    console.log(seconde);
                    console.log(centiemeSeconde);
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
                    $('#start').removeAttr('disabled').text('continuer')
                    $('#init').removeAttr('disabled')
                });

                $('#init').click(function(){
                     centiemeSeconde = 0;
                     seconde = 0;
                     minute = 0;
                     heure = 0;
                    $('#dureerencontre').val('00:00:00:00');
                    $(this).attr('disabled','disabled')
                    $('#start').removeAttr('disabled').text('Commencer')
                    $('#stop').attr('disabled','disabled');
                });

            });
    </script>
    <script type="text/javascript">
        //niveaudetude
        $(document).ready(function(){

            $('textarea').each(function(){
                $(this).val($(this).val().trim());
            });

            $( "#niveaudetude" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('diagnostik.autocomniveautude')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#niveaudetude').val(ui.item.label); // display the selected text
                    //$('#agenceid').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
        //specialitediplome
        $(document).ready(function(){
            $( "#specialitediplome" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('diagnostik.autocomspecialite')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#specialitediplome').val(ui.item.label); // display the selected text
                    //$('#agenceid').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
        /*lieudereisdence agenceid*/
        $(document).ready(function(){
            $( "#lieudereisdence" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    $.ajax({
                        url:"{{route('diagnostik.autocomville')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#lieudereisdence').val(ui.item.label); // display the selected text
                    $('#agenceid').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
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
                            $('#matriculeaej').val(data[0].label);
                            $('#sexe').val(data[0].sexe);
                            $('#datenaissance').val(data[0].datenaissance);
                            $('#age').val(data[0].age);
                            $('#naturepiece').val(data[0].typepieceidentite);
                            $('#npiece').val(data[0].numerocni);
                            $('#nationalite').val(data[0].nationalite);
                            $('#contact').val(data[0].telephone);
                            $('#diplome').val(data[0].diplome);
                            $('#niveaudetude').val(data[0].niveauetude);
                            $('#nomprenom').val(data[0].nomprenom);
                            $("#addAej").modal('hide');
                             $('#loader').fadeOut();
                        },error: function (jqXHR, exception) {
                            alert('reessayer svp !!!');
                            $('#loader').fadeOut();
                        }
                        });
                    }
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
