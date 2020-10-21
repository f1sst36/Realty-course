@extends('admin.layout')
@section('content')
<div class="pull-right">
  <a href="{{ route('roles') }}" class="btn btn-default" title="Группы пользователей">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>
<h1 class="h3">Редактирование группы пользователей</h1>
<div class="clearfix"></div>
<hr>
<form method="post" action="{{ route('editForm') }}">
@csrf
    @include('admin.errors')
<input type="hidden" name="id" value="{{ $user_role->id }}">
  <div class="row">
    <div class="col-lg-4 col-md-4">
  	  <div class="form-group">
  		<label>Наименование  <span class="text-danger">*</span></label>
		<input name="title" type="text" value="{{ $user_role->title }}" class="form-control" placeholder="Наименование">
  	  </div>
      <p><a href="#" class="sell_all">Выделить все</a> | <a href="#" class="unsell_all">Снять выделение</a></p>
  
        @if($accesses->isNotEmpty())
            
            @for ($i = 1; $i < count($accesses) + 1; $i++)
                <div class="checkbox">
                  <label>
                    @if(isset($currentAccesses[$i]) && $currentAccesses[$i]->section_id == $accesses[$i]->id)
                    <input type="checkbox" checked class="sell_item" name="role-{{ $accesses[$i]->id }}" value="{{ $accesses[$i]->id }}"> {{ $accesses[$i]->section }}
                    @else
                    <input type="checkbox" class="sell_item" name="role-{{ $accesses[$i]->id }}" value="{{ $accesses[$i]->id }}"> {{ $accesses[$i]->section }}
                    @endif

                    
                  </label>
                </div>
                @endfor
           
        @endif
    
      <br>
      <button type="submit" class="btn btn-primary">Сохранить</button>
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