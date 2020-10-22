@extends('admin.layout')
@section('content')
<form class="form_delete" method="post" action="{{ route('deleteArticles') }}">
@csrf
<div class="pull-right">
@if(isset($accesses[1]))
  <a href="{{ route('createForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
@endif
@if(isset($accesses[2]))
  <button type="submit" class="btn btn-default button_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
  @endif
</div>
<h3>Список материалов</h3>
<div class="clearfix"></div>
<hr>
@if($articles->isNotEmpty())
@if(isset($accesses[3]))
    <input type="hidden" name="article_count" value='{{ count($articles) }}'>
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
        <td><input type="checkbox" name="article-{{ $article->id }}" class="sell_item" value="{{ $article->id }}"></td>
        @if(isset($accesses[2]))
        <td><a href="{{ route('editArticleForm', $article->id) }}">{{ $article->title }}</a></td>
        @else
        <td>{{ $article->title }}</td>
        @endif
        <td>
            @if($article->type == 1 )
                Без категории
            @else
                Новости
            @endif
        </td>
        <td>{{ $article->created_at }}</td>
    </tr>
@endforeach
        </tbody>
      </table>
      @else
<p>Список материалов недоступен.</p>
@endif
@else
    <p>Список материалов пуст.</p>
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