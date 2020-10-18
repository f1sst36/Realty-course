@extends('layout')
@section('content')
<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li><a href="{{ route('realtyInfo') }}">Недвижимость</a></li>
  <li class="active">Форма заявки</li>
</ol>

<h1>Форма заявки</h1>
<hr>

@include('errors')

<form method="post" action="{{ route('addOrder') }}">
    @csrf
    <div class="form-group">
        <label>ФИО <span class="text-danger">*</span></label>
        <input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="ФИО" required>
    </div>
  
    <div class="form-group">
        <label>Контактный телефон <span class="text-danger">*</span></label>
        <input name="phone" type="tel" class="form-control" value="{{ old('phone') }}" placeholder="+79998887766" required>
    </div>
  
      <div class="form-group">
  		<label>Тип недвижимости <span class="text-danger">*</span></label>
		<select name="type" id="type" class="form-control">
            @foreach($orderTypes as $orderType)
            <option value="{{ $orderType->id }}">{{ $orderType->type }}</option>
            @endforeach
        </select>
  	  </div>
  
      <div class="form-group" id="value_block">
  		<label>Вид недвижимости <span class="text-danger">*</span></label>
		<select name="structure" id="value" class="form-control">
            @foreach($orderStructures as $orderStructure)
            <option value="{{ $orderStructure->id }}">{{ $orderStructure->structure }}</option>
            @endforeach
        </select>
  	  </div>
  
    <div class="form-group">
        <label>Площадь (м&sup2;) <span class="text-danger">*</span></label>
        <input name="area" type="text" class="form-control" value="{{ old('area') }}" placeholder="Площадь" required>
    </div>
  
    <div class="form-group">
        <label>Цена (руб.) <span class="text-danger">*</span></label>
        <input name="price" type="text" class="form-control" value="{{ old('price') }}" placeholder="Цена" required>
    </div>
  
    <div class="form-group">
        <label>Описание <span class="text-danger">*</span></label>
        <textarea name="description" class="form-control" rows="3" placeholder="Описание" required>{{ old('description') }}</textarea>
    </div>
    
  
    <button type="submit" class="btn btn-success">Отправить</button>
    <br><br>
    
</form>
@endsection