@extends('layouts.master')

@section('title') Campaigns @endsection

@section('subTitle') Lead Template @endsection

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
                                    <form id="videoForm" action="" class="icons-tab-steps wizard-circle"
                                          method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="template" value="optin">
                                    @csrf
                                    <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-info"></i>Information Demandeur</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="matriculeaej">N° AEJ</label>
                                                        <input type="text" name="matriculeaej" id="matriculeaej" placeholder="numero aej" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="sexe">Sexe</label>
                                                        <input type="text" class="form-control" id="sexe" name="sexe">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="datenaisance">Date naissance</label>
                                                        <input type="text" class="form-control" id="datenaissance" name="datenaissance" placeholder="date de naissance">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="age">Age</label>
                                                        <input type="text" class="form-control" id="age" name="age" placeholder="age">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="naturepiece">Nature Piece</label>
                                                        <input type="text" name="naturepiece" id="naturepiece" placeholder="nature pieces" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="numpiece">N° Piece</label>
                                                        <input type="text" name="npiece" id="npiece" placeholder="N° piece" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="nationalite">Nationalite</label>
                                                        <input type="text" name="nationalite" id="nationalite" placeholder="nationalite" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="contact">Contact</label>
                                                        <input type="text" name="contact" id="contact" placeholder="contact" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="lieudereisdence">Lieu de residence habituel</label>
                                                        <input type="text" name="lieudereisdence" id="lieudereisdence" placeholder="Lieu de Residence" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="diplome">Diplôme</label>
                                                        <input type="text" name="diplome" id="diplome" placeholder="Diplôme" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="specialitediplome">Spécialité du diplôme</label>
                                                        <input type="text" name="specialitediplome" id="specialitediplome" placeholder="Spécialité du diplôme" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="anneediplome">Année d'obtention du diplôme</label>
                                                        <input type="text" name="anneediplome" id="anneediplome" placeholder="Année d'obtention du diplôme" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="niveaudetude">Niveau d'etudes</label>
                                                        <input type="text" name="niveaudetude" id="niveaudetude" placeholder="Niveau d'etudes" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 2 -->
                                        <h6><i class="step-icon feather icon-settings"></i> Settings</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" id="title" name="campaign[title]" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="campaign[description]" id="description" rows="3"
                                                                  class="form-control ckeditor" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="tags">Tags</label>
                                                        <input type="text" class="form-control" id="tags" name="campaign[tags]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="retargeting">Retargeting</label>
                                                        <textarea name="campaign[retargeting]" id="retargeting" rows="3"
                                                                  class="form-control ckeditor"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 3 -->
                                        <h6><i class="step-icon feather icon-box"></i> Optin</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="productTitle">Title</label>
                                                        <input type="text" class="form-control" id="productTitle" name="products[0][title]" required="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="productDescription">Description</label>
                                                        <textarea name="products[0][description]" id="productDescription" rows="3" class="form-control" required=""></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="productPrice">Headline</label>
                                                        <input type="text" class="form-control" id="productHeadline" name="products[0][headline]" required="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="ctaText">Button Text</label>
                                                        <input type="text" class="form-control" id="ctaText" name="products[0][ctaText]">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="ThankMessage">Thank You Message</label>
                                                        <input type="text" class="form-control" id="thankMessage" name="products[0][thank_message]" required="">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="productImage">Image</label><br>
                                                        <input type="file" id="productImage" name="products[0][image]">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--div class="accordion" id="slidesAccordion" data-toggle-hover="true"></div-->
                                            <br>
                                            <!--button id="addSlide" class="btn btn-block btn-success">Add Optin</button-->
                                            <br>
                                        </fieldset>

                                        <!-- Step 4 -->
                                        <h6><i class="step-icon feather icon-circle"></i> Customize</h6>
                                        <fieldset>
                                            <div class="accordion" id="custom" data-toggle-hover="true">
                                                <div class="collapse-margin">
                                                    <div class="card-header" id="customHeadingOne">
                                                        <span class="lead collapse-title collapsed" data-toggle="collapse" role="button"
                                                              data-target="#customCollapseOne" aria-expanded="false" aria-controls="customCollapseOne">
                                                          Player
                                                        </span>
                                                    </div>
                                                    <div id="customCollapseOne" class="collapse" aria-labelledby="customHeadingOne" data-parent="#custom">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="progressBarColor">Color</label>
                                                                        <input type="color" class="form-control" id="progressBarColor" name="player[color]" value="#086EB3">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="controlsBarDisplay">Control Bar</label>
                                                                        <select class="custom-select form-control" id="controlsBarDisplay" name="player[controls]">
                                                                            <option value="1" selected>Yes</option>
                                                                            <option value="0">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="autoplay">Autoplay</label>
                                                                        <select class="custom-select form-control" id="autoplay" name="player[autoplay]">
                                                                            <option value="1">Yes</option>
                                                                            <option value="0" selected>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-none">
                                                                    <div class="form-group">
                                                                        <label for="playerSize">Size</label>
                                                                        <select class="custom-select form-control" id="playerSize" name="player[size]">
                                                                            <option value="550x304">550x469</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="playerThumbnail">Thumbnail</label>
                                                                        <input type="file" id="playerThumbnail" name="player[thumbnail]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse-margin">
                                                    <div class="card-header" id="customHeadingTwo">
                                                    <span class="lead collapse-title collapsed" data-toggle="collapse" role="button"
                                                          data-target="#customCollapseTwo" aria-expanded="false" aria-controls="customCollapseTwo">
                                                      Optin
                                                    </span>
                                                    </div>
                                                    <div id="customCollapseTwo" class="collapse" aria-labelledby="customHeadingTwo" data-parent="#custom">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="titleSize">Title Size</label>
                                                                        <select class="custom-select form-control" id="titleSize" name="player[optinTitleSize]">
                                                                            <option value="12">12</option>
                                                                            <option value="14">14</option>
                                                                            <option value="16">16</option>
                                                                            <option value="18">18</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="titleColor">Title Color</label>
                                                                        <input type="color" class="form-control" id="titleColor" name="player[optinTitleColor]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="descriptionSize">Description Size</label>
                                                                        <select class="custom-select form-control" id="descriptionSize" name="player[optinDescriptionSize]">
                                                                            <option value="12">12</option>
                                                                            <option value="14">14</option>
                                                                            <option value="16">16</option>
                                                                            <option value="18">18</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="descriptionColor">Description Color</label>
                                                                        <input type="color" class="form-control" id="descriptionColor" name="player[optinDescriptionColor]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="ctaSize">CTA Size</label>
                                                                        <select class="custom-select form-control" id="ctaSize" name="player[optinCtaSize]">
                                                                            <option value="12">12</option>
                                                                            <option value="14">14</option>
                                                                            <option value="16">16</option>
                                                                            <option value="18">18</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="ctaColor">CTA Color</label>
                                                                        <input type="color" class="form-control" id="ctaColor" name="player[optinCtaColor]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="buttonColor">Button Color</label>
                                                                        <input type="color" class="form-control" id="buttonColor" name="player[optinButtonColor]" value="#FE0000">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse-margin">
                                                    <div class="card-header" id="customHeadingThree">
                                                        <span class="lead collapse-title" data-toggle="collapse" role="button" data-target="#customCollapseThree" aria-expanded="false" aria-controls="customCollapseThree">
                                                          Sharing
                                                        </span>
                                                    </div>
                                                    <div id="customCollapseThree" class="collapse" aria-labelledby="customHeadingThree" data-parent="#custom">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="facebookLogo">Facebook</label>
                                                                        <select class="custom-select form-control" id="facebookLogo" name="player[facebookLogo]">
                                                                            <option value="1">Yes</option>
                                                                            <option value="0" selected>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="twitterLogo">Twitter</label>
                                                                        <select class="custom-select form-control" id="twitterLogo" name="player[twitterLogo]">
                                                                            <option value="1">Yes</option>
                                                                            <option value="0" selected>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="linkedinLogo">Linkedin</label>
                                                                        <select class="custom-select form-control" id="linkedinLogo" name="player[linkedinLogo]">
                                                                            <option value="1">Yes</option>
                                                                            <option value="0" selected>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="pinterestLogo">Pinterest</label>
                                                                        <select class="custom-select form-control" id="pinterestLogo" name="player[pinterestLogo]">
                                                                            <option value="1">Yes</option>
                                                                            <option value="0" selected>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="collapse-margin">
                                                    <div class="card-header" id="customHeadingFour">
                                                        <span class="lead collapse-title collapsed" data-toggle="collapse" role="button" data-target="#customCollapseFour" aria-expanded="false" aria-controls="customCollapseFour">
                                                          Brand
                                                        </span>
                                                    </div>
                                                    <div id="customCollapseFour" class="collapse" aria-labelledby="customHeadingFour" data-parent="#custom">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="brandRemoved">Remove</label>
                                                                        <select class="custom-select form-control" id="brandRemoved" name="player[brandRemoved]">
                                                                            <option value="1" selected>Yes</option>
                                                                            <option value="0">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 brandLink">
                                                                    <div class="form-group">
                                                                        <label for="brandLink">Link</label>
                                                                        <input type="text" class="form-control" id="brandLink" name="player[brandLink]">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 brandImage">
                                                                    <div class="form-group">
                                                                        <label for="brandImage">Image</label> <br>
                                                                        <input type="file" id="brandImage" name="player[brandImage]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div>

                                {{--<div class="col-6 offset-1">
                                    <div class="video-container">
                                        <div class="player-brand" style="display: none;">
                                            <a href="#" target="_blank"><img src="" alt="Banding Logo"></a>
                                        </div>
                                        <div class="sharing-buttons">
                                            <a href="#" class="facebook">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </a>
                                            <a href="#" class="pinterest">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </a>
                                            <a href="#" class="twitter">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                            <a href="#" class="linkedin">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="offer-info">
                                            <div class="offer-content">
                                                <i class="fa fa-close mask-offer"></i>
                                                <form action="#" class="form" method="post">
                                                    @csrf()
                                                    <div class="form-group">
                                                        <h2 class="offer-headline" style="text-align: center;">Headline</h2>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-block btn-primary">Download Your Copy</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="my-video">
                                            <div class="plyr" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY"></div>
                                        </div>
                                        <div class="optin-offer">
                                            <img src="{{ asset('img/offer-default.png') }}" alt="">
                                            <div class="right-block">
                                                <h2 class="offer-title">Product Title</h2>
                                                <p class="offer-description">Product Description</p>
                                                <div class="right-block-bottom">
                                                    <a id="show-offer" href="#" class="btn btn-sm btn-danger offer-link" target="_blank">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
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

            $(document).ready(function(){
                $( "#matriculeaej" ).autocomplete({
                    source: function( request, response ) {
                       if(request.term.length > 11){
                            console.log(request.term.length);
                            // Fetch data
                            $.ajax({
                                url:"http://localhost/diag_api/public/api/"+ request.term,
                                type: 'get',
                                dataType: "json",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    search: request.term
                                },
                                success: function( data ) {
                                    response( data );
                                }
                            });
                       }

                    },
                    select: function (event, ui) {
                        // Set selection
                        console.log(ui.item);
                        console.log(ui.item);
                        $('#matriculeaej').val(ui.item.label);
                        $('#sexe').val(ui.item.sexe);
                        $('#datenaissance').val(ui.item.datenaissance);
                        $('#age').val(ui.item.age);
                        $('#naturepiece').val(ui.item.typepieceidentite);
                        $('#npiece').val(ui.item.numerocni);
                        $('#nationalite').val(ui.item.nationalite);
                        $('#contact').val(ui.item.telephone);
                        $('#diplome').val(ui.item.diplome);
                        $('#niveaudetude').val(ui.item.niveauetude);
                        // display the selected text
                        //$('#agenceid').val(ui.item.value); // save selected id to input
                        return false;
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
