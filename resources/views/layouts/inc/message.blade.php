@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Veuillez joindre la grille entretien et la grille de diagnostique.
      {{--  {{ implode('', $errors->all(':message <br>')) }}--}}
    </div>
@endif
