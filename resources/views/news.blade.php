@extends('layout')
@section('content')
<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">Новости</li>
</ol>
<h1>Новости</h1>

@if(!$news->isEmpty())
    @foreach($news as $new)
        <hr>
        <h2><a href="{{ route('article', $new->id) }}">{{ $new->title }}</a></h2>
        <p class="small text-muted">{{ $new->created_at }}</p>
        <p class="text-rught">{{ $new->preview }}</p>
    @endforeach
@else
    <p>Список материалов пуст.</p>
@endif

@endsection