@if($errors->any() || session()->get('msg'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ $errors->first() }}
    {{ session()->get('msg') }}
</div>
@endif