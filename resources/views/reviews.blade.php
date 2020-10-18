@extends('layout')
@section('content')
<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">Отзывы</li>
</ol>

<div id="reviews">
    <h1 class="h3">Отзывы</h1>
    <div class="row">
        @foreach($allReviews as $review)
            <div class="col-md-6">
            <div class="well">
                <div class="desc">
                <strong>{{ $review->author }}</strong>, <span class="text-muted small">{{ $review->created_at }}</span><br>
                {{ $review->text }}
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>

@if($allReviews->total() > $allReviews->count())
    {!! $allReviews->links() !!}
@endif

@endsection