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

<h1 class="h3">Добавление нового пункта меню</h1>
<div class="clearfix"></div>
<hr>
@include('admin.errors')

<form method="post" id="form_product" action="{{ route('createMenuItem') }}">
@csrf
  <div class="row">
    <div class="col-sm-4">
    
  	  <div class="form-group">
  		<label>Наименование <span class="text-danger">*</span></label>
		<input name="title" type="text" class="form-control" value="{{ old('title') }}" placeholder="Наименование">
  	  </div>
      
            <?php
            // $parent_menus = getMenuItems();
            // $tree = getTree($parent_menus['data']);
            // $cat_menu = showCatAdmin($tree);
            ?>
      
  	  <div class="form-group">
  		<label>Родительский пункт</label>
		<select name="parent_id" id="parent_id" class="form-control">
          <option value="0">Нет</option>
          @foreach($menus as $menu)
          <option value="{{ $menu->id }}">{{ $menu->title }}</option>
          @endforeach
        </select>
  	  </div>
  	  <div class="form-group">
  		<label>Тип</label>
		<select name="type" id="type" class="form-control">
          <option value="0">Без категории</option>
          @foreach($menuTypes as $key => $menuType)
            <option value="{{ $key }}">{{ $menuType }}</option>
          @endforeach
            <?php
            // if(count($menu_types) > 0) {
            //     foreach($menu_types as $menu_key => $menu_val) {
            //         $selected = '';
            //         if($menu_key == $_SESSION['formFields']['type']) {
            //             $selected = ' selected';
            //         }
            //         echo '<option value="' . $menu_key . '"' . $selected . '>' . $menu_val . '</option>';
            //     }
            // }
            ?>
        </select>
  	  </div>

        <?php
        // $mysqli_connect = mysqliConnect();
        // $articles = array();
        // $query = mysqli_query($mysqli_connect, "
        //     SELECT
        //         *
        //     FROM
        //         `articles`
        //     ORDER BY
        //         `title`
        // ");
        // if(mysqli_num_rows($query) > 0) {
        //     while($row = mysqli_fetch_assoc($query)) {
        //         $articles[] = $row;
        //     }
        // }
        // mysqli_close($mysqli_connect);
        ?>
      
  	  <div class="form-group" id="value_block" style="display: none;">
  		<label>Материал <span class="text-danger">*</span></label>
		<select name="material_id" id="value" class="form-control">
          <option value="0">Выберите материал</option>
            @foreach($articles as $article)
                <option value="{{ $article->id }}">{{ $article->title }}</option>
            @endforeach
        </select>
  	  </div>

  	  <div class="form-group">
  		<label>Порядок отображения</label>
		<input name="order" type="number" min="0" class="form-control" value="{{ old('order', 0) }}" placeholder="0">
  	  </div>
      
      <div class="checkbox">
        <label>
          <input type="checkbox" name="homepage" value="1"> Главная страница
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
        if(this.value == 1 || this.value == 6) {
            $("#value_block").show("slow");
        } else {
            $("#value_block").hide("slow");
        }
        
    });
    
});
</script>

@endsection