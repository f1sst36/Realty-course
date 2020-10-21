@extends('admin.layout')
@section('content')

<div class="pull-right">
  <a href="#" class="btn btn-default" id="btnPlusOk" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
  <a href="{{ route('users') }}" class="btn btn-default" title="Список пользователей">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>
<h1 class="h3">Редактирование пользователя</h1>
<div class="clearfix"></div>
<hr>

@include('admin.errors')

<form method="post" id="form_product" action="{{ route('editUser') }}">
@csrf

    <input type="hidden" name="id" value="{{ $user->id }}">
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <label>Телефон <span class="text-danger">*</span></label>
      <div class="input-group">
        <span class="input-group-addon">+7</span>
        <input maxlength="10" type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="9998887766" required autofocus>
      </div>
      <p class="text-muted small">10 цифр в формате 9998887766</p>
  	  <div class="form-group">
  		<label>Имя <span class="text-danger">*</span></label>
		<input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" placeholder="Имя">
  	  </div>
  	  <div class="form-group">
  		<label>Группа пользователя  <span class="text-danger">*</span></label>
		<select name="role_id" class="form-control">
          <!-- <option value="0">Выберите группу</option> -->
          @foreach($roles as $role)
          @if($user->role_id == $role->id) 
          <option value="{{ $role->id }}" selected>{{ $role->title }}</option>
             @else
            <option value="{{ $role->id }}">{{ $role->title }}</option>
          @endif
          @endforeach
        </select>
  	  </div>
  	  <div class="form-group">
  		<label>Пароль <span class="text-danger">*</span></label>
  		<input name="password" type="password" value="{{ old('password', $user->password) }}" class="form-control password" placeholder="Пароль">
  	  </div>
  	  <div class="form-group">
  		<label>Пароль еще раз <span class="text-danger">*</span></label>
  		<input name="re_password" type="password" value="{{ old('re_password', $user->password) }}" class="form-control password" placeholder="Пароль еще раз">
  	  </div>
    </div>
  </div>
</form>

<script>
$(function() {
    $("#btnPlusOk").click(function() {
        $("#form_product").submit();
        return false;
    });
    
});
</script>


@endsection
