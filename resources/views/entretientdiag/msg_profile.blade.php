@extends('layouts.master')
@section('title') Message @endsection
@section('subTitle') Mise à jour profil @endsection
@section('content')
    <h2 style="color: orangered" align="center">
        Veuillez effectuer la mise à jour du profil du demandeur concerné par l'entretien, diagnostique que vous allez démarrer !!!
    </h2>
   {{-- <a align="center" class="btn btn-primary" href="{{ route('entretient.create') }}">
        <span><i class="feather icon-plus"></i>Effectuer la mise à jour</span>
    </a>--}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAej">
        Effectuer la mise à jour
    </button>
    <div class="modal fade" id="addAej" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white" id="myModalLabel16">Entrez n° AEJ</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        {{--<h3 style="color: orangered" align="justify">
                            Veuillez effectuer la mise à jour du profil du demandeur
                            concerné par l'entretien diagnostique que vous allez démarrer !!!
                        </h3>--}}
                        <br>
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
                        <div id="result" style="display: none;" class="text-center text-success">
                            <strong>Importation réalisée avec succès</strong>
                            {{--https://www.agenceemploijeunes.ci/site/01aej18/digit/demandeur/demandeursall/preview/50548--}}
                            {{--<strong>Mise à jour profil  <a style="color: deepskyblue;" id="urlprofile" href="#" target="_blank">ici</a></strong>--}}
                        </div>
                        <div id="resulterror" style="display: none;" class="text-center text-warning"><strong>Numéro existe déjà</strong></div>
                        <div id="resulterrorformat" style="display: none;" class="text-center text-warning"><strong>Format non-conforme</strong></div>

                        <!--form control-->
                        <div class="form-group text-right mb-0">
                            <a href="{{ route('entretient.create') }}" id="close" style="display: none;" class="btn btn-secondary">Passer à l'entretient </a>
                            <a href="#" id="profile" style="display: none;" class="btn btn-outline-info">Mise à jour profil</a>
                            <a class="btn btn-warning" id="return" href="{{route('home')}}">retour</a>
                            <button type="button" id="aej_ok" class="btn btn-success">ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('#addAej').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                //var rencontre_id = button.data('rencontre_id');
                var modal = $(this);
               // modal.find('.modal-body #rencontre_id_rdv').val(rencontre_id);
            });

           /* $("#addAej").modal(
                {
                    keyboard: false,
                    backdrop:'static'
                },'show');*/
            var test = $("#aej_ok");
            $("#aej_ok").click(function() {
                $('#loader').fadeIn();
                $('#resulterror').fadeOut();
                $('#resulterrorformat').fadeOut();

                var matriculeaej = $('#matriculeaej').val();

                var createurl = "{{ route('entretient.create',':test') }}"

                if(matriculeaej == ""){
                    $('#loader').fadeOut();
                    $('#resulterrorformat').fadeIn();
                } else {
                    $.ajax({
                        url: "{{ route('verif.aejentretien') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            matriculeaej: matriculeaej
                        },success: function( data ) {
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
                                        if(array.length == 1){
                                            $('#loader').fadeOut();
                                            $('#result').fadeIn();
                                            $('#close').fadeIn();
                                            $('#profile').fadeIn();
                                            $('#aej_ok').hide();
                                            $('#return').hide();
                                            var url= createurl.replace(':test',matriculeaej);
                                            console.table(url);
                                            $('#close').attr('href',createurl.replace(':test',matriculeaej))
                                            $('#urlprofile').attr('href','https://www.agenceemploijeunes.ci/site/01aej18/digit/demandeur/demandeursall/preview/'+array[0].value)
                                            $('#profile').attr('href','https://www.agenceemploijeunes.ci/site/01aej18/digit/demandeur/demandeursall/preview/'+array[0].value)
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
                                            $('#msgupdate_profil').fadeIn();
                                        } else {
                                            $('#loader').fadeOut();
                                            $('#resulterror').fadeIn();
                                        }

                                    },error: function (jqXHR, exception) {
                                        alert('reessayer svp !!!');
                                        $('#loader').fadeOut();
                                        $('#resulterrorformat').fadeIn();
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
                }
            });

            if ($('#videoSource').val() === 'youtube') {
                $('#btnFindVideo').fadeIn('fast');
            }

            // Resize the offers slider on window's resize
            $(window).on('resize', function() {
                makeResizing()
            });

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                    $(this).remove();
                });
            }, 50000);

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
    </script>
@endsection
