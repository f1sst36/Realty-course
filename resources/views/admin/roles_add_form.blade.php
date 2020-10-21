@extends('admin.layout')
@section('content')
<div class="pull-right">
  <a href="{{ route('roles') }}" class="btn btn-default" title="Группы пользователей">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>
<h1 class="h3">Добавление группы пользователей</h1>
<div class="clearfix"></div>
<hr>
<form method="post" action="{{ route('createRole') }}">
@csrf
    @include('admin.errors')

  <div class="row">
    <div class="col-lg-4 col-md-4">
  	  <div class="form-group">
  		<label>Наименование  <span class="text-danger">*</span></label>
		<input name="title" type="text" class="form-control" placeholder="Наименование">
  	  </div>
      <p><a href="#" class="sell_all">Выделить все</a> | <a href="#" class="unsell_all">Снять выделение</a></p>
  
        @if($accesses->isNotEmpty())
            @foreach($accesses as $access)
                <div class="checkbox">
                  <label>
                    <input type="checkbox" class="sell_item" name="role-{{ $access->id }}" value="{{ $access->id }}"> {{ $access->section }}
                  </label>
                </div>
            @endforeach
        @endif
    
      <br>
      <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
  </div>
  
</form>

<script>
$(function() {
    $(".sell_all").click(function() {
        $(".sell_item").each(function(){
            $(this).prop("checked", true);
        });
        return false;
    });
    $(".unsell_all").click(function() {
        $(".sell_item").each(function(){
            $(this).prop("checked", false);
        });
        return false;
    });
});
</script>
@endsection