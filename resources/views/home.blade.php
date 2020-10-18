@extends('layout')
@section('content')
<ol class="breadcrumb">
  <li class="active">Главная</li>
</ol>

<div class="row">
    @if($homeArticle)
    <div class="col-sm-9">
        <h1>{{ $homeArticle->title }}</h1>
        <img src="{{ asset('img/image_1.jpg') }}" alt="Главная" /><br />
        {!! $homeArticle->text !!}
    </div>
    @endif
    <div class="col-sm-3">
        <h3>Последние новости</h3>
        @foreach($lastArticles as $article)
            <p><a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
            <br>
                <small>{{ $article->created_at }}</small>
            </p>
            <hr>
        @endforeach
    </div>

</div>
@endsection