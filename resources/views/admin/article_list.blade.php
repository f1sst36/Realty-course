@extends('admin.layout')
@section('content')
<div class="pull-right">
  <a href="{{ route('createForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
  <button type="button" class="btn btn-default button_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
</div>
<h3>Список материалов</h3>
<div class="clearfix"></div>
<hr>
@if($articles->isNotEmpty())
    <form class="form_delete" method="post">
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th><input type="checkbox" class="sell_all"></th>
            <th>Наименование</th>
            <th>Тип записи</th>
            <th>Дата создания</th>
          </tr>
        </thead>
        <tbody>
@foreach($articles as $article)
    <tr>
        <td><input type="checkbox" name="article" class="sell_item" value="{{ $article->id }}"></td>
        <td><a href="">{{ $article->title }}</a></td>
        <td>
            @if($article->type == 1 )
                Запись на главной
            @else
                Новости
            @endif
        </td>
        <td>{{ $article->created_at }}</td>
    </tr>
@endforeach
        </tbody>
      </table>
    </form>
@else
    <p>Список материалов пуст.</p>
@endif
@endsection