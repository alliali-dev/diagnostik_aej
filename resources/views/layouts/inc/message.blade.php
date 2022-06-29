@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Une erreur est survenue dans le formulaire :
        {{ implode('', $errors->all(':message</div>')) }}
@endif
