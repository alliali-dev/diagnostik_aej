@extends('layouts.master')
@section('title') Gestion de rencontre @endsection
@section('subTitle') Suivie 1 | 2 | 3 | 4 | 5 @endsection
@section('content')
<section id="socialAccounts" class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs justify-content-end" id="myPillTab" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="twitter-icon-pill" data-toggle="pill" href="#twitterPIll"
                               role="tab"
                               aria-controls="twitterPIll" aria-selected="false">1ere RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reddit-icon-pill" data-toggle="pill" href="#redditPIll"
                               role="tab"
                               aria-controls="redditPIll" aria-selected="false">2e RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="linkedin-icon-pill" data-toggle="pill" href="#linkedinPIll"
                               role="tab"
                               aria-controls="linkedinPIll" aria-selected="false">3e RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tumblr-icon-pill" data-toggle="pill" href="#tumblrPIll"
                               role="tab"
                               aria-controls="tumblrPIll" aria-selected="false">4e RENCONTRE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pinterest-icon-pill" data-toggle="pill" href="#pinterestPIll"
                               role="tab"
                               aria-controls="pinterestPIll" aria-selected="false">5e RENCONTRE</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="facebookPagePIll" role="tabpanel"
                             aria-labelledby="facebook-page-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                {{--@if( \App\Helper::canAdd('account') )--}}
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#fb_page_modal">Add New Page
                                        </button>
                                    </div>
                               {{-- @endif--}}
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        {{--<div class="tab-pane fade" id="facebookGroupPIll" role="tabpanel"
                             aria-labelledby="facebook-group-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                               --}}{{-- @if( \App\Helper::canAdd('account') )--}}{{--
                                    <div class="mb-4">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#fb_group_modal">Add New Profile
                                        </button>
                                    </div>
                               --}}{{-- @endif--}}{{--
                            </div>
                            <div class="row">

                            </div>
                        </div>--}}
                        <div class="tab-pane fade  show active" id="twitterPIll" role="tabpanel" aria-labelledby="twitter-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                <div class="mb-4">
                                   {{-- <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                            data-target="#twitter_modal">Add New Profile
                                    </button>--}}
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive-sm">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>N AEJ</th>
                                            <th>NOM PRENOM</th>
                                            <th>SEXE</th>
                                            <th>COMMUNE</th>
                                            <th>DIPLOME</th>
                                            <th>DUREE RENCONTRE (h:m:s:ms)</th>
                                            <th>DATE RENDEZ-VOUS</th>
                                            <th>AXE TRAVAIL</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rencontres->where('typerencontre',1)->get() as $item)

                                            @if($item->dateprochainrdv->isFuture() )
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    @php
                                                        $output = '';
                                                        $now = Carbon\Carbon::now();
                                                        $end_date = Carbon\Carbon::parse($item->dateprochainrdv);
                                                        $endOutput = $end_date->diff(\Carbon\Carbon::now())->format('Rendez-vous dans %d jour %h heure et %i min');

                                                    @endphp
                                                    <td class="float-right">
                                                        <span class="badge badge-success mr-1" style="font-size: small;">
                                                            {{$endOutput}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $item->suivirencontre->matricule_aej }}</td>
                                                    <td>{{ $item->suivirencontre->nomprenom }}</td>
                                                    <td>{{ $item->suivirencontre->sexe }}</td>
                                                    <td>{{ $item->suivirencontre->lieudereisdence }}</td>
                                                    <td>{{ $item->suivirencontre->diplome }}</td>
                                                    <td>{{ $item->dureerencontre }}</td>
                                                    <td>{{ $item->dateprochainrdv }}</td>
                                                    <td>{{ $item->axetravail }}</td>
                                                    <td class="float-right">
                                                        <button class="btn btn-primary btn-rounded"
                                                                data-toggle="modal"
                                                                data-target="#traiter2rdv">Traiter 2eme RDV
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif

                                        @endforeach
                                        @if(count($rencontres->get()) < 1)
                                            <tr>
                                                <td colspan="10" class="text-center">Pas d'suivie trouvé !</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="redditPIll" role="tabpanel"
                             aria-labelledby="reddit-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                {{--@if( \App\Helper::canAdd('account') )--}}
                                    <div class="mb-4">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#reddit_modal">Add New Profile
                                        </button>
                                    </div>
                               {{-- @endif--}}
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane fade" id="linkedinPIll" role="tabpanel"
                             aria-labelledby="linkedin-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                               {{-- @if( \App\Helper::canAdd('account') )--}}
                                    <div class="mb-4">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#linkedin_modal">Add New Profile
                                        </button>
                                    </div>
                                {{--@endif--}}
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tumblrPIll" role="tabpanel"
                             aria-labelledby="tumblr-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                    <div class="mb-4">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#tumblr_modal">Add New Profile
                                        </button>
                                    </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pinterestPIll" role="tabpanel"
                             aria-labelledby="pinterest-icon-pill">
                            <div class="d-flex align-items-end flex-column">
                                {{--@if( \App\Helper::canAdd('account') )--}}
                                    <div class="mb-4">
                                        <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                data-target="#pinterest_modal">Add New Profile
                                        </button>
                                    </div>
                                {{--@endif--}}
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{--modal rencontre 1 vers 2 --}}
            <div class="modal fade" id="traiter2rdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title text-white" id="myModalLabel16">Renseigner 2eme Rencontre</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Duree de la rencontre</label>
                                                <input type="text" class="form-control" id="dureerencontre" name="rencontre[dureerencontre]" required>
                                            </div>
                                            <div class="form-group text-right mb-0">
                                                <button type="button" id="start" class="btn btn-success">
                                                    <i class="feather icon-play"></i>
                                                </button>
                                                <button type="button" id="stop" class="btn btn-warning">
                                                    <i class="feather icon-pause"></i>
                                                </button>
                                                <button type="button" id="init" class="btn btn-info">
                                                    <i class="feather icon-refresh-ccw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
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
                                <!--form control-->
                                <div class="form-group text-right mb-0">
                                    <button type="button" id="aej_ok" class="btn btn-success">valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Modal de Suppression -->
            <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel16" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger white">
                            <h4 class="modal-title" id="myModalLabel16">Delete Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['route'=>'diagnostik.destroy', 'files'=>true , 'methode' => 'POST']) }}
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <p class="text-center">
                                    Are you sure you want to delete this?
                                </p>
                                <input type="hidden" name="account_id" id="account_id" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel
                                </button>
                                <button type="submit" class="btn btn-warning">Yes, Delete</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script type="text/javascript" src="https://daokun.webs.com/jquery.stopwatch.js"></script>

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
                $('#start').removeAttr('disabled')
                $('#init').removeAttr('disabled')
            });

            $('#init').click(function(){
                centiemeSeconde = 0;
                seconde = 0;
                minute = 0;
                heure = 0;
                $('#dureerencontre').val('00:00:00:00');
                $(this).attr('disabled','disabled')
                $('#start').removeAttr('disabled')
                $('#stop').attr('disabled','disabled');
            });

        });

        $('textarea').each(function(){
            $(this).val($(this).val().trim());
        });

        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var account_id = button.data('account_id');
            var modal = $(this);
            modal.find('.modal-body #account_id').val(account_id);
        })
    </script>
@endsection


{{--
@extends('layouts.master')

@section('title') Gestion de rencontre @endsection

@section('subTitle') Suivie 1 | 2 | 3 | 4 | 5 @endsection

@section('content')
    <section id="socialAccounts" class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs justify-content-end" id="myPillTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="twitter-icon-pill" data-toggle="pill" href="#1rencontre"
                                   role="tab"
                                   aria-controls="twitterPIll" aria-selected="false">1ere RENCONTRE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reddit-icon-pill" data-toggle="pill" href="#2rencontre"
                                   role="tab"
                                   aria-controls="redditPIll" aria-selected="false">2eme RENCONTRE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="linkedin-icon-pill" data-toggle="pill" href="#3rencontre"
                                   role="tab"
                                   aria-controls="linkedinPIll" aria-selected="false">3eme RENCONTRE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tumblr-icon-pill" data-toggle="pill" href="#4rencontre"
                                   role="tab"
                                   aria-controls="tumblrPIll" aria-selected="false">4eme RENCONTRE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tumblr-icon-pill" data-toggle="pill" href="#5rencontre"
                                   role="tab"
                                   aria-controls="tumblrPIll" aria-selected="false">5eme RENCONTRE</a>
                            </li>
                            <!--li class="nav-item">
                                <a class="nav-link" id="pinterest-icon-pill" data-toggle="pill" href="#pinterestPIll"
                                   role="tab"
                                   aria-controls="pinterestPIll" aria-selected="false">Pinterest</a>
                            </li-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade  show active" id="1rencontre" role="tabpanel"
                                 aria-labelledby="twitter-icon-pill">
                                --}}
{{--<div class="d-flex align-items-end flex-column">
                                    @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#twitter_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif
                                </div>--}}{{--

                                <div class="row">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>N AEJ</th>
                                                <th>NOM PRENOM</th>
                                                <th>SEXE</th>
                                                <th>COMMUNE</th>
                                                <th>DIPLOME</th>
                                                <th>DUREE RENCONTRE (h:m:s:ms)</th>
                                                <th>DATE RENDEZ-VOUS</th>
                                                <th>AXE TRAVAIL</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($suivies->get() as $item)
                                                <tr>
                                                    <td>{{ $item->matricule_aej }}</td>
                                                    <td>{{ $item->nomprenom }}</td>
                                                    <td>{{ $item->sexe }}</td>
                                                    <td>{{ $item->lieudereisdence }}</td>
                                                    <td>{{ $item->diplome }}</td>
                                                    <td>{{first_rencontre($item->id)->dureerencontre }}</td>
                                                    <td>{{first_rencontre($item->id)->dateprochainrdv }}</td>
                                                    <td>{{first_rencontre($item->id)->axetravail }}</td>
                                                    <td class="float-right">
                                                        <a href=""
                                                           class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">
                                                            <i class="feather icon-edit"></i>
                                                        </a>
                                                        <button type="button"
                                                                data-id=""
                                                                data-toggle="modal"
                                                                data-target="#deletedEcole"
                                                                class="btn btn-icon btn-icon rounded-circle btn-danger mr-0 waves-effect waves-light">
                                                            <i class="feather icon-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if(count($suivies->get()) < 1)
                                                <tr>
                                                    <td colspan="10" class="text-center">Pas d'suivie trouvé !</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center mt-2">
                                            {{ $suivies->paginate(5)->links() }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="2rencontre" role="tabpanel"
                                 aria-labelledby="reddit-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                   --}}
{{-- @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#reddit_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}{{--

                                </div>
                                <div class="row">
                                    --}}
{{--@foreach($accounts as $account)
                                        @if($account->getRelation('network')->slug === 'reddit')
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="card shadow border-danger bg-transparent">
                                                    <div class="card-header d-flex align-items-start mb-2 pb-0">
                                                        <div class="avatar bg-rgba-danger mt-1 ml-2 p-50">
                                                            <div class="avatar-content">
                                                                <img
                                                                    src="{{ network_image($account->getRelation('network')->slug)  }}"
                                                                    height="70" width="70" alt="">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p class="mb-1">{{ $account->name }}</p>
                                                            <div class="float-right">
                                                                <a href="{{ route('accounts.edit',$account->id) }}"
                                                                   class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-edit-1"></i>
                                                                </a>
                                                                <a href=""
                                                                   class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-repeat"></i>
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light"
                                                                        data-account_id={{$account->id}} data-toggle="modal"
                                                                        data-target="#delete">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach--}}{{--

                                </div>
                            </div>
                            <div class="tab-pane fade" id="3rencontre" role="tabpanel"
                                 aria-labelledby="linkedin-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                   --}}
{{-- @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#linkedin_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}{{--

                                </div>
                                <div class="row">
                                   --}}
{{-- @foreach($accounts as $account)
                                        @if($account->getRelation('network')->slug === 'linkedin')
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="card shadow border-primary bg-transparent">
                                                    <div class="card-header d-flex align-items-start mb-2 pb-0">
                                                        <div class="avatar bg-rgba-primary mt-1 ml-2 p-50">
                                                            <div class="avatar-content">
                                                                <img
                                                                    src="{{ network_image($account->getRelation('network')->slug)  }}"
                                                                    height="70" width="70" alt="">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p class="mb-1">{{ $account->name }}</p>
                                                            <div class="float-right">
                                                                <a href="{{ route('accounts.edit',$account->id) }}"
                                                                   class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-edit-1"></i>
                                                                </a>
                                                                <a href=""
                                                                   class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-repeat"></i>
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light"
                                                                        data-account_id={{$account->id}} data-toggle="modal"
                                                                        data-target="#delete">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach--}}{{--

                                </div>
                            </div>
                            <div class="tab-pane fade" id="4rencontre" role="tabpanel"
                                 aria-labelledby="tumblr-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                   --}}
{{-- @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#tumblr_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}{{--

                                </div>
                                <div class="row">
                                   --}}
{{-- @foreach($accounts as $account)
                                        @if($account->getRelation('network')->slug === 'tumblr')
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="card shadow border-primary bg-transparent">
                                                    <div class="card-header d-flex align-items-start mb-2 pb-0">
                                                        <div class="avatar bg-rgba-primary mt-1 ml-2 p-50">
                                                            <div class="avatar-content">
                                                                <img
                                                                    src="{{ network_image($account->getRelation('network')->slug)  }}"
                                                                    height="70" width="70" alt="">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p class="mb-1">{{ $account->name }}</p>
                                                            <div class="float-right">
                                                                <a href="{{ route('accounts.edit',$account->id) }}"
                                                                   class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-edit-1"></i>
                                                                </a>
                                                                <a href=""
                                                                   class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-repeat"></i>
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light"
                                                                        data-account_id={{$account->id}} data-toggle="modal"
                                                                        data-target="#delete">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach--}}{{--

                                </div>
                            </div>
                            <div class="tab-pane fade" id="5rencontre" role="tabpanel"
                                 aria-labelledby="pinterest-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                    --}}
{{--@if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#pinterest_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}{{--

                                </div>
                                <div class="row">
                                   --}}
{{-- @foreach($accounts as $account)
                                        @if($account->getRelation('network')->slug === 'pinterest')
                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="card shadow border-danger bg-transparent">
                                                    <div class="card-header d-flex align-items-start mb-2 pb-0">
                                                        <div class="avatar bg-rgba-danger mt-1 ml-2 p-50">
                                                            <div class="avatar-content">
                                                                <img
                                                                    src="{{ network_image($account->getRelation('network')->slug)  }}"
                                                                    height="70" width="70" alt="">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p class="mb-1">{{ $account->name }}</p>
                                                            <div class="float-right">
                                                                <a href="{{ route('accounts.edit',$account->id) }}"
                                                                   class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-edit-1"></i>
                                                                </a>
                                                                <a href=""
                                                                   class="btn btn-icon btn-icon rounded-circle btn-success mr-0 waves-effect waves-light">
                                                                    <i class="feather icon-repeat"></i>
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light"
                                                                        data-account_id={{$account->id}} data-toggle="modal"
                                                                        data-target="#delete">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach--}}{{--

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal de Suppression -->
                <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger white">
                                <h4 class="modal-title" id="myModalLabel16">Delete Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ Form::open(['route'=>'diagnostik.store', 'files'=>true , 'methode' => 'POST']) }}
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <div class="modal-body">
                                    <p class="text-center">
                                        Are you sure you want to delete this?
                                    </p>
                                    <input type="hidden" name="account_id" id="account_id" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel
                                    </button>
                                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                                </div>
                                {{ Form::close() }}
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
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var account_id = button.data('account_id');
            var modal = $(this);
            modal.find('.modal-body #account_id').val(account_id);
        })
    </script>
@endsection
--}}
