@extends('layouts.master')

@section('title') Agence @endsection

@section('subTitle') Gestion d'agences @endsection


@section('content')

    <section class="card">
        <div class="card-header">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-content">

            <div class="card-body">

                <div class="mb-3">
                    <a class="btn btn-primary" href=""
                       data-toggle="modal"
                       data-target="#addAgence">
                        <span><i class="feather icon-plus"></i>Ajouter agence</span>
                    </a>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>code</th>
                            <th>date creation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agences as $item)
                            <tr>
                                <td> {{ $item->id }}</td>
                                <td> {{ $item->name }}</td>
                                <td> {{ $item->code }}</td>
                                <td> {{ $item->created_at }}</td>
                                <td class="float-right">
                                    <button type="button"
                                            data-id="{{$item->id}}"
                                            data-name="{{$item->name}}"
                                            data-code="{{$item->code}}"
                                            data-toggle="modal"
                                            data-target="#editAgence"
                                            class="btn btn-icon btn-icon rounded-circle btn-primary mr-0 waves-effect waves-light">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                    <button type="button"
                                            data-id="{{$item->id}}"
                                            data-toggle="modal"
                                            data-target="#deletedAgence"
                                            class="btn btn-icon btn-icon rounded-circle btn-danger mr-0 waves-effect waves-light">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        @if(count($agences) < 1)
                            <tr>
                                <td colspan="10" class="text-center">Pas d'agence trouv?? !</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-2">
                        {{ $agences->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </section>


    <!-- Modal New Social Viewer -->
    <div class="modal fade" id="addAgence" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myModalLabel16">Ajouter agence</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ Form::open(['route'=>'users.agencestore', 'files'=>true , 'method' => 'POST']) }}
                {{csrf_field()}}
                <!-- Form Group -->
                    <div class="form-group">
                        <label for="email-1">Name</label>
                        <input type="text" name="name" class="form-control"  aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group">
                        <label for="email-1">Code</label>
                        <input type="text" name="code" class="form-control" aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group text-right mb-0">
                        <button type="submit" class="btn btn-success text-uppercase">Ajouter</button>
                    </div>
                    <!-- /form group -->
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal New Social Viewer -->
    <div class="modal fade" id="editAgence" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="myModalLabel16">Modifier role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                {{ Form::open(['route'=>'users.agenceupdate', 'files'=>true , 'method' => 'POST']) }}
                @method('PUT')
                @csrf()
                <!-- Form Group -->
                    <div class="form-group">
                        <label for="email-1">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp1">
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="email-1">Code</label>
                        <input type="text" name="code" class="form-control" id="code" aria-describedby="emailHelp1">
                    </div>
                    <div class="form-group text-right mb-0">
                        <button type="submit" class="btn btn-success text-uppercase">Modifier</button>
                    </div>
                    <!-- /form group -->
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" id="deletedAgence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title" id="myModalLabel16">Confirmation la suppression</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>'users.agencedestroy', 'files'=>true , 'methode' => 'POST']) }}
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p class="text-center">
                            ??tes-vous s??r de vouloir le supprimer ?
                        </p>
                        <input type="hidden" name="id" id="agence_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Non, Annuler</button>
                        <button type="submit" class="btn btn-warning">Oui, Supprimer</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $('#deletedAgence').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #agence_id').val(id);
        });

        $('#editAgence').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var code = button.data('code');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #code').val(code);
        });
    </script>
@endsection
