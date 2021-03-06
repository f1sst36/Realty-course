@extends('admin.layout')
@section('content')
<div class="pull-right">
  <a href="{{ route('articles') }}" class="btn btn-default" title="Список курсов">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>
<h1 class="h3">Редактирование материала</h1>
<div class="clearfix"></div>
<hr>

<form method="post" action="{{ route('editArticle') }}">
    @csrf
    @include('admin.errors')
    <input type="hidden" name="id" value="{{ $article->id }}">
    <div class="form-group">
        <label>Заголовок <span class="text-danger">*</span></label>
        <input name="title" type="text" class="form-control" value="{{ old('title', $article->title) }}">
    </div>
    
      <div class="form-group">
  		<label>Тип записи</label>
		<select name="type" id="type" class="form-control">
        @if($article->type = 0)
            <option value="0" selected> Новости</option>
            <option value="1">Без категории</option>
        @else
            <option value="0"> Новости</option>
            <option value="1" selected>Без категории</option>
        @endif
            
        </select>
  	  </div>
      
    <div class="form-group">
        <label>Время создания <span class="text-danger">*</span></label>
        <input name="created_at" type="text" class="form-control" value="{{ $article->created_at }}" disabled>
    </div>
      
    <div class="form-group">
        <label>Анонс</label>
        <textarea name="preview" id="preview" rows="3" class="form-control">{{ old('preview', $article->preview) }}</textarea>
    </div>
    
    <div class="form-group">
        <label>Текст <span class="text-danger">*</span></label>
        <textarea name="text" id="text" rows="10" class="form-control">{{ old('text', $article->text) }}</textarea>
    </div>
  
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <br><br>
    
</form>

<!-- <script src="https://cdn.tiny.cloud/1/<? //$tiny_api ?>/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
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