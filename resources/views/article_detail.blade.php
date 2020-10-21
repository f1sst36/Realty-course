@extends('layout')
@section('content')
<ol class="breadcrumb">
    <li><a href="/">Главная</a></li>
    <li><a href="{{ route('acticles') }}">Новости</a></li>

    <li class="active">{!! $article->title !!}</li>
</ol>

<h1>{{ $article->title }}</h1>
<p class="small text-muted">{{ $article->created_at }}</p>
{!! $article->text !!}

@endsection