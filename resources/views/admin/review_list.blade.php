@extends('admin.layout')
@section('content')
<form method="post" id="form_delete" action="{{ route('deleteReview') }}">
@csrf
<div class="pull-right">
  <a href="{{ route('createReviewForm') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
  <button type="button" class="btn btn-default" id="button_delete">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
</div>
<h1 class="h3">Список отзывов</h1>
<div class="clearfix"></div>
<hr>
@if($reviews->isNotEmpty())
    
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th><input type="checkbox" id="select_all"></th>
            <th>Автор</th>
            <th>Текст</th>
          </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
            <td><input name="review-{{ $review->id }}" type="checkbox" class="item_id" value="{{ $review->id }}"></td>
            <td><a style="white-space: nowrap;" href="{{ route('editReviewForm', $review->id) }}">{{ $review->author }}</a></td>
            <td>{!! $review->text !!}</td>
        @endforeach
        </tbody>
      </table>
   

    @if($reviews->total() > $reviews->count())
        {!! $reviews->links() !!}
    @endif
@else
    <p class="text-warning">Список отзывов пуст.</p>
@endif
</form>
<script>
$(function() {
    
    $("#select_all").change(function() {
        if($(this).prop("checked") == true) {
            $(".item_id").each(function(){
                $(this).prop("checked", true);
            });
        } else {
            $(".item_id").each(function(){
                $(this).prop("checked", false);
            });
        }
    });
    
    $("#button_delete").click(function() {
        $("#form_delete").submit();
    });
    
});
</script>

@endsection