@extends('admin.layout')
@section('content')

<div class="pull-right">
  <a href="{{ route('createUserForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
  <button type="button" class="btn btn-default button_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
</div>
<h1 class="h3">Список пользователей</h1>
<div class="clearfix"></div>
<hr>

@if($users->isNotEmpty())
<form class="form_delete" method="post">
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
            @if($user->role->type == 1)
            <td><input type="checkbox" name="user-{{ $user->id }}" class="sell_item" value="{{ $user->id }}" disabled></td>
            @else
          <td><input type="checkbox" name="user-{{ $user->id }}" class="sell_item" value="{{ $user->id }}"></td>
          @endif
          <td><a href="">{{ $user->phone }}</a></td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->role->title }}</td>
          <td>{{ $user->created_at }}</td>
          <td>{{ $user->last_visit }}</td>
        </tr>
@endforeach
</tbody>
      </table>
    </form>
@else
<p>Список пользователей пуст.</p>
@endif

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