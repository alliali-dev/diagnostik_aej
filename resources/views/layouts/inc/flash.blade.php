<div class="row justify-content-md-center">
    @forelse(['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has($msg) )
            <div class="col-md-12">
                <div class="alert alert-dismissible alert-{{$msg}}">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">{{ Session::get($msg) }}</p>
                </div>
            </div>
        @endif
    @empty
    @endforelse
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
        {{ implode('', $errors->all('<div>:message</div>')) }}
    </div>
@endif
