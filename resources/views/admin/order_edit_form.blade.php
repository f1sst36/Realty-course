@extends('admin.layout')
@section('content')
<form method="post" id="form_product" action="{{ route('editOrder') }}">
@csrf
<div class="pull-right">
  <a href="#" class="btn btn-default" id="btnPlusOk">
    <span class="glyphicon glyphicon-ok"></span>
  </a>
  <a href="{{ route('orders') }}" class="btn btn-default">
    <span class="glyphicon glyphicon-arrow-left"></span>
  </a>
</div>
<h1 class="h3">Редактирование заявки</h1>
<div class="clearfix"></div>
<hr>
@include('admin.errors')

  <input type="hidden" name="id" value="{{ $order->id }}">
    <div class="form-group">
        <label>ФИО <span class="text-danger">*</span></label>
        <input name="name" type="text" class="form-control" value="{{ old('name', $order->name) }}" placeholder="ФИО" required>
    </div>
  
    <div class="form-group">
        <label>Контактный телефон <span class="text-danger">*</span></label>
        <input name="phone" type="tel" class="form-control" value="{{ old('phone', $order->phone) }}" placeholder="+79998887766" required>
    </div>
  
      <div class="form-group">
  		<label>Тип недвижимости <span class="text-danger">*</span></label>
		<select name="type" id="type" class="form-control">
            @foreach($orderTypes as $orderType)
                @if($order->orderType->type == $orderType->type)
                    <option value="{{ $orderType->id }}" selected>{{ $orderType->type }}</option>
                @else
                    <option value="{{ $orderType->id }}">{{ $orderType->type }}</option>
                @endif
            @endforeach
        </select>
  	  </div>
  
      <div class="form-group" id="value_block">
  		<label>Вид недвижимости <span class="text-danger">*</span></label>
		<select name="structure" id="value" class="form-control">
             @foreach($orderStructures as $orderStructure)
                @if($order->orderStructure->structure == $orderStructure->structure)
                    <option value="{{ $orderStructure->id }}" selected>{{ $orderStructure->structure }}</option>
                @else
                    <option value="{{ $orderStructure->id }}">{{ $orderStructure->structure }}</option>
                @endif
            @endforeach
        </select>
  	  </div>
  
    <div class="form-group">
        <label>Площадь <span class="text-danger">*</span></label>
        <input name="area" type="text" class="form-control" value="{{ old('area', $order->area) }}" placeholder="Площадь" required>
    </div>
  
    <div class="form-group">
        <label>Цена <span class="text-danger">*</span></label>
        <input name="price" type="text" class="form-control" value="{{ old('price', $order->price) }}" placeholder="Цена" required>
    </div>
  
    <div class="form-group">
        <label>Описание <span class="text-danger">*</span></label>
        <textarea name="description" class="form-control" rows="3" placeholder="Описание" required>{{ old('name', $order->description) }}</textarea>
    </div>
  
      <div class="form-group">
  		<label>Статус <span class="text-danger">*</span></label>
		<select name="status" id="status" class="form-control">
            @if($order->status == 1) 
                <option value="1" selected>На рассмотрении</option>
                <option value="2">Опубликовано</option>
            @elseif($order->status == 2)
                <option value="1">На рассмотрении</option>
                <option value="2" selected>Опубликовано</option>
            @endif
        </select>
  	  </div>
    
</form>

<script>
$(function() {
    
    $("#btnPlusOk").click(function() {
        $("#form_product").submit();
        return false;
    });
    
    
    $("#type").on("change", function() {
        
        var options_1 = '<option value="1">Склады</option><option value="2">Офисы</option><option value="3">Ангары</option>';
        var options_2 = '<option value="1">Комнаты</option><option value="2">Квартиры</option><option value="3">Дома</option>';
        
        if(this.value == 3) {
            
            $("#value_block").hide("slow");
            
        } else {
            
            $("#value_block").show("slow");
        
            if(this.value == 1) {
                $("#value").html(options_1);
            }
            
            if(this.value == 2) {
                $("#value").html(options_2);
            }
            
        }
        
    });
    
});
</script>
@endsection