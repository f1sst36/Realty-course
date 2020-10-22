@extends('admin.layout')
@section('content')
<div class="pull-right">
  <a href="" class="btn btn-default" id="btnPlusOk" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
  <a href="{{ route('menus') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>

<h1 class="h3">Редактирование пункта меню</h1>
<div class="clearfix"></div>
<hr>
@include('admin.errors')

<form method="post" id="form_product" action="{{ route('editMenuItem') }}">
@csrf
  <div class="row">
    <div class="col-sm-4">
    <input type="hidden" name="id" value="{{ $currentMenu->id }}">
  	  <div class="form-group">
  		<label>Наименование <span class="text-danger">*</span></label>
		<input name="title" type="text" class="form-control" value="{{ old('title', $currentMenu->title) }}" placeholder="Наименование">
  	  </div>
      
  	  <div class="form-group">
  		<label>Родительский пункт</label>
		<select name="parent_id" id="parent_id" class="form-control">
          <option value="0">Нет</option>
          @foreach($menus as $menu)
            @if($currentMenu->parent_id == $menu->id)
                <option value="{{ $menu->id }}" selected>{{ $menu->title }}</option>
            @else
                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
            @endif
          @endforeach
        </select>
  	  </div>
  	  <div class="form-group">
  		<label>Тип</label>
		<select name="type" id="type" class="form-control">
          <option value="0">Без категории</option>
          @foreach($menuTypes as $key => $menuType)
            @if($currentMenu->type == $key)
            <option value="{{ $key }}" selected>{{ $menuType }}</option>
            @else
            <option value="{{ $key }}">{{ $menuType }}</option>
            @endif
          @endforeach
        </select>
  	  </div>

      @if($currentMenu->type == 1 || $currentMenu->type == 6)
      <div class="form-group" id="value_block">
      @else
      <div class="form-group" id="value_block" style="display: none;">
      @endif
  		<label>Материал <span class="text-danger">*</span></label>
		<select name="material_id" id="value" class="form-control">
          <option value="0">Выберите материал</option>
            @foreach($articles as $article)
                @if($currentMenu->material_id == $article->id)
                <option value="{{ $article->id }}" selected>{{ $article->title }}</option>
                @else
                <option value="{{ $article->id }}">{{ $article->title }}</option>
                @endif
            @endforeach
        </select>
  	  </div>

  	  <div class="form-group">
  		<label>Порядок отображения</label>
		<input name="order" type="number" min="0" class="form-control" value="{{ old('order', $currentMenu->order) }}" placeholder="0">
  	  </div>
      
      <div class="checkbox">
        <label>
            @if($currentMenu->homepage == 1)
            <input type="checkbox" name="homepage" value="1" checked> Главная страница
            @else
            <input type="checkbox" name="homepage" value="1"> Главная страница
            @endif
        </label>
      </div>
      
    </div>
  </div>
</form>

<script>
$(function() {
    
    $("#btnPlusOk").click(function() {
        $("#form_product").submit();
        return false;
    });
    
    $("#type").on("change", function() {
        if(this.value == 1) {
            $("#value_block").show("slow");
        } else {
            $("#value_block").hide("slow");
        }
        
    });
    
});
</script>

@endsection