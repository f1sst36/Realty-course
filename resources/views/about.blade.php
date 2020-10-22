@extends('layout')
@section('content')
<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">О компании</li>
</ol>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  
  <div class="item active">
      <img src="{{ asset($firstImg->path) }}" alt="">
      <div class="carousel-caption">
      </div>
    </div>
  @foreach($imgs as $img)
    <div class="item">
      <img src="{{ asset($img->path) }}" alt="">
      <div class="carousel-caption">
      </div>
    </div>
  @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<h1>{{ $article->title }}</h1>
{!! $article->text !!}
<!-- <h1>О компании</h1>
<h2>История</h2>
Задача организации, в особенности же рамки и место обучения кадров играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. Задача организации, в особенности же укрепление и развитие структуры позволяет выполнять важные задания по разработке новых предложений. Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности позволяет оценить значение позиций, занимаемых участниками в отношении поставленных задач.

<h2>Услуги</h2>
Задача организации, в особенности же укрепление и развитие структуры требуют определения и уточнения дальнейших направлений развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности требуют от нас анализа существенных финансовых и административных условий. Таким образом укрепление и развитие структуры обеспечивает широкому кругу (специалистов) участие в формировании модели развития.

<h2>Награды</h2>
Не следует, однако забывать, что начало повседневной работы по формированию позиции требуют определения и уточнения существенных финансовых и административных условий. Таким образом постоянный количественный рост и сфера нашей активности представляет собой интересный эксперимент проверки дальнейших направлений развития. Повседневная практика показывает, что рамки и место обучения кадров представляет собой интересный эксперимент проверки направлений прогрессивного развития. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции требуют от нас анализа систем массового участия. -->

<h2>Отзывы.</h2>
<div class="row">

@foreach($reviews as $review)
    <div class="col-md-6">
        <div class="well">
        <div class="desc">
            <strong>{{ $review->author }}</strong>, <span class="text-muted small">{{ $review->created_at }}</span><br>
            {!! $review->text !!}
        </div>
        </div>
    </div>
@endforeach

</div>
<p class="text-right"><a href="{{ route('reviews') }}">Все отзывы</a></p>
@endsection