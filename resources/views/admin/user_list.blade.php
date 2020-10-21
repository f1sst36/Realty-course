@extends('admin.layout')
@section('content')
<form class="form_delete" method="post" action="{{ route('deleteUser') }}">
@csrf
<div class="pull-right">
@if(isset($accesses[14]))
  <a href="{{ route('createUserForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
@endif
@if(isset($accesses[15]))
  <button type="button" class="btn btn-default button_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
@endif
</div>
<h1 class="h3">Список пользователей</h1>
<div class="clearfix"></div>
<hr>
@if(isset($accesses[16]))
@if($users->isNotEmpty())

      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th><input type="checkbox" class="sell_all"></th>
            <th>Номер телефона</th>
            <th>Имя</th>
            <th>Группа</th>
            <th>Дата регистрации</th>
            <th>Последняя активность</th>
          </tr>
        </thead>
        <tbody>
@foreach($users as $user)
        <tr>
            @if($user->id == 1)
            <td><input type="checkbox" name="user-{{ $user->id }}" class="sell_item" value="{{ $user->id }}" disabled></td>
            @else
          <td><input type="checkbox" name="user-{{ $user->id }}" class="sell_item" value="{{ $user->id }}"></td>
          @endif
          @if(isset($accesses[15]))
          <td><a href="{{ route('editUserForm', $user->id) }}">{{ $user->phone }}</a></td>
          @else
          <td>{{ $user->phone }}</td>
          @endif
          <td>{{ $user->name }}</td>
          <td>{{ $user->role->title }}</td>
          <td>{{ $user->created_at }}</td>
          <td>{{ $user->last_visit }}</td>
        </tr>
@endforeach
</tbody>
      </table>
   
@else
<p>Список пользователей пуст.</p>
@endif

@else
<p>У вас нет доступа к списку пользователей.</p>
@endif
</form>
<script>
$(function() {
    $(".sell_all").change(function() {
        if($(this).prop("checked") == true) {
            $(".sell_item").each(function(){
                $(this).prop("checked", true);
            });
        } else {
            $(".sell_item").each(function(){
                $(this).attr("checked", false);
            });
        }
    });
    $(".button_delete").click(function() {
        $(".form_delete").submit();
    });
});
</script>

@endsection