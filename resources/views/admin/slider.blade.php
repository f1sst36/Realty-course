@extends('admin.layout')
@section('content')
<h1 class="h3">Редактирование слайдера</h1>
<hr>

<form method="post" enctype="multipart/form-data" action="{{ route('uploadImageOrDelete') }}">
    @csrf
        <label>Изображения</label>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <span class="btn btn-danger" disabled>
                Выбрать
              </span>
            </span>
            <input type="text" class="form-control" disabled>
            <span class="input-group-btn">
              <button type="button" class="image_plus btn btn-default" title="Добавить">
                <span class="glyphicon glyphicon-plus"></span>
              </button>
            </span>
          </div>
        </div>
        <p class="small">Разрешено загружать изображения в формате jpg, jpeg, gif, png, не превышающие 5 мб.</p>
        @if($images->isNotEmpty())
            <div class="post-images row">
            @foreach($images as $image)
                <div class="col-sm-2">
                  <a class="thumbnail" data-fancybox="images" href="/{{ $image->path }}" style="margin-bottom: 0;">
                    <!-- <img src="/' . $image['image_small'] . '" alt="" class="img-responsive">   -->
                    <img src="/{{ $image->path }}" alt="" class="img-responsive">  
                  </a>
                  <div class="checkbox">
                    <label>
                      <input name="images_delete-{{ $image->id }}" type="checkbox" value="{{ $image->id }}"> Удалить
                    </label>
                  </div>                  
                </div>
            @endforeach
            </div>
        @endif
  <button type="submit" class="btn btn-primary">Сохранить</button>
  <br><br>
</form>

<script>
$(function() {
        window.img_count = 0;
       $(document).on('change', '.btn-file :file', function() {
           var input = $(this),
           numFiles = input.get(0).files ? input.get(0).files.length : 1,
           label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
           input.trigger('fileselect', [numFiles, label]);
       });
       
       $(document).on('fileselect', '.btn-file :file', function(event, numFiles, label) {
           var input = $(this).parents('.input-group').find(':text'),
		log = numFiles > 1 ? numFiles + ' files selected' : label;
		if(input.length) {
			input.val(log);
		}
       });
       
       $(document).on("click touchstart", ".image_plus", function() {
           $(
           '<div class="form-group">' +
             '<div class="input-group">' +
               '<span class="input-group-btn">' +
                 '<span class="btn btn-primary btn-file">' +
                   'Выбрать <input type="file" accept=".jpg,.jpeg,.gif,.png" name="image-' + window.img_count + '">' +
                 '</span>' +
               '</span>' +
               '<input type="text" class="form-control" disabled>' +
               '<span class="input-group-btn">' +
                 '<button type="button" class="image_minus btn btn-default" title="Удалить">' +
                   '<span class="glyphicon glyphicon-minus"></span>' +
                 '</button>' +
               '</span>' +
             '</div>' +
           '</div>'
           ).fadeIn('slow').insertBefore($(this).parents(".form-group"));
           window.img_count++;
           return false;
       });
        
       $(document).on("click touchstart", ".image_minus", function() {
           $(this).parents(".form-group").remove();
           return false;
       });

});

</script>
@endsection