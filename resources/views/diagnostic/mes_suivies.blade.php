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
                                {{--<div class="d-flex align-items-end flex-column">
                                    @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#twitter_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif
                                </div>--}}
                                <div class="row">
                                    <div class="table-responsive-sm">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>N AEJ</th>
                                                <th>SEXE</th>
                                                <th>COMMUNE</th>
                                                <th>DIPLOME</th>
                                                <th>DUREE RENCONTRE</th>
                                                <th>AXE TRAVAIL</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($suivies->get() as $item)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                                   {{-- @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#reddit_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}
                                </div>
                                <div class="row">
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
                                    @endforeach--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="3rencontre" role="tabpanel"
                                 aria-labelledby="linkedin-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                   {{-- @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#linkedin_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}
                                </div>
                                <div class="row">
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
                                    @endforeach--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="4rencontre" role="tabpanel"
                                 aria-labelledby="tumblr-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                   {{-- @if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#tumblr_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}
                                </div>
                                <div class="row">
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
                                    @endforeach--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="5rencontre" role="tabpanel"
                                 aria-labelledby="pinterest-icon-pill">
                                <div class="d-flex align-items-end flex-column">
                                    {{--@if( \App\Helper::canAdd('account') )
                                        <div class="mb-4">
                                            <button class="btn btn-primary btn-rounded" data-toggle="modal"
                                                    data-target="#pinterest_modal">Add New Profile
                                            </button>
                                        </div>
                                    @endif--}}
                                </div>
                                <div class="row">
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
                                    @endforeach--}}
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
