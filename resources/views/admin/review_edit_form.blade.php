@extends('admin.layout')
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('editReview') }}">
@csrf
<div class="pull-right">
  <button type="submit" class="btn btn-default">Сохранить</button>
  <a href="{{ route('reviewList') }}" class="btn btn-default" title="Список товаров">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>
<h1 class="h3">Редактирование  отзыва</h1>
<div class="clearfix"></div>
<hr>

<div class="row">

  <div class="col-sm-6">
 
    @include('admin.errors')
    <input type="hidden" name="id" value="{{ $review->id }}">
    <div class="form-group">
      <label>Автор <span class="text-danger">*</span></label>
      <input name="author" type="text" class="form-control" value="{{ old('author', $review->author) }}">
    </div>
    
    <div class="form-group">
      <label>Время <span class="text-danger">*</span></label>
      <input name="created_at" type="text" class="form-control" value="{{ $review->created_at }}" disabled>
    </div>
    
    <div class="form-group">
      <label>Текст <span class="text-danger">*</span></label>
      <textarea name="text" id="text" class="form-control" rows="5">{{ old('text', $review->text) }}</textarea>
    </div>
    
  </div>
    
</div>

</form>

<script>
tinymce.init({
  selector: '#text',
  language: 'ru',
  //images_upload_url: '/postAcceptor.php',
  toolbar: "sizeselect | bold italic | fontselect |  fontsizeselect | image code table",
  plugins: "image imagetools advcode table linkchecker autolink lists checklist",
  fontsize_formats: "8px 10px 12px 14px 18px 24px 36px"
});
</script>

@endsection