@extends('admin.layout')
@section('content')
<form class="form_delete" method="post" action="{{ route('roleDelete') }}">
@csrf
<div class="pull-right">
@if(isset($accesses[17]))
  <a href="{{ route('createRoleForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
@endif
@if(isset($accesses[18]))
  <button type="button" class="btn btn-default button_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
@endif
</div>
<h1 class="h3">Группы пользователей</h1>
<div class="clearfix"></div>
<hr>

@if(isset($accesses[19]))
@if($user_roles->isNotEmpty())

      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th><input type="checkbox" class="sell_all"></th>
            <th>Наименование</th>
          </tr>
        </thead>
        <tbody>
    @foreach($user_roles as $role)
    <tr>
            @if($role->id  == 1 || $role->id == 2)
            <td><input type="checkbox" name="role-{{ $role->id }}" class="sell_item" value="{{ $role->id }}" disabled></td>
            @else
            <td><input type="checkbox" name="role-{{ $role->id }}" class="sell_item" value="{{ $role->id }}"></td>
            @endif

            @if(isset($accesses[18]))
          <td><a href="{{ route('editRoleForm', $role->id) }}">{{ $role->title }}</a></td>
          @else
          <td>{{ $role->title }}</td>
          @endif
        </tr>
    @endforeach
    </tbody>
      </table>
    
@else
<p>Список групп пользователей пуст.</p>
@endif

@else
<p>У вас нет доступа к списку групп пользователей.</p>
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