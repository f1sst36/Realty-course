@extends('layout')
@section('content')
<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">Как нас найти</li>
</ol>

<h1>Как нас найти</h1>
<div id="map">
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af416982d62765e9a2ffb72508f2f0e398a17d1321cedfb46aeeecdea2425c648&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
</div>
@endsection