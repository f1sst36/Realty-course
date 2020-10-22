@extends('admin.layout')
@section('content')
<div class="pull-right">
  <a href="{{ route('createMenuForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
  <button type="button" class="btn btn-default button_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
</div>

<h1 class="h3">Все пункты меню</h1>
<div class="clearfix"></div>
<hr>
@if($menus->isNotEmpty())
<form class="form_delete" method="post" action="{{ route('deleteMenu') }}">
@csrf
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th><input type="checkbox" class="sell_all"></th>
            <th>Наименование</th>
          </tr>
        </thead>
        <tbody>
@foreach($menus as $menu)
    <tr>
        <td><input type="checkbox" name="menu-{{ $menu->id }}" class="sell_item" value="{{ $menu->id }}"></td>
        <td><a href="{{ route('editMenuItemForm', $menu->id) }}">{{ $menu->title }}</a></td>
    </tr>
@endforeach
</tbody>
      </table>
    </form>
@else
<p>Список пунктов меню пуст.</p>
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
                $(this).prop("checked", false);
            });
        }
    });
    $(".button_delete").click(function() {
        $(".form_delete").submit();
    });
});
</script>
@endsection