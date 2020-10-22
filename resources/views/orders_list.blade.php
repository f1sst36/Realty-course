@extends('layout')
@section('content')
<h1>Список заказов</h1>
<div class="clearfix"></div>
<hr>

<form action="{{ route('orderFilter') }}" method="get">
    
    <div class="row">
    
        <div class="col-sm-2">
          <div class="form-group">
            <label>Тип недвижимости <span class="text-danger">*</span></label>
            <select name="type" id="type" class="form-control">
                <option value="0">Показать все</option>
                @foreach($orderTypes as $orderType)
                    <option value="{{ $orderType->id }}">{{ $orderType->type }}</option>
                @endforeach
            </select>
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
            <label>Вид недвижимости <span class="text-danger">*</span></label>
            <select name="structure" id="value" class="form-control">
                <option value="0">Показать все</option>
                @foreach($orderStructures as $orderStructure)
                    <option value="{{ $orderStructure->id }}">{{ $orderStructure->structure }}</option>
                @endforeach
            </select>
          </div>
        </div>
        
        <div class="col-sm-2">
          <div class="form-group">
              <label>Площадь <span class="text-danger">*</span></label>
              <input name="area" type="text" class="form-control" value="0" placeholder="Площадь">
          </div>
        </div>
                
        <div class="col-sm-2">
          <div class="form-group">
              <label>Цена<span class="text-danger">*</span></label>
              <input name="minPrice" type="text" class="form-control" value="0" placeholder="Мин. Цена">
          </div>
        </div>
      
        <!-- <div class="col-sm-2">
          <div class="form-group">
              <label>Цена(до)<span class="text-danger">*</span></label>
              <input name="maxPrice" type="text" class="form-control" value="0" placeholder="Макс. Цена">
          </div>
        </div> -->
                
        <div class="col-sm-2">
          <button type="submit" class="btn btn-success btn-block" style="margin-top: 25px;">
            <span class="glyphicon glyphicon-search"></span> Показать
          </button>
        </div>
                
        <div class="col-sm-2">
          <a href="{{ route('orderList') }}" class="btn btn-default btn-block" style="margin-top: 25px;">
            <span class="glyphicon glyphicon-refresh"></span> Сбросить
          </a>
        </div>
            
    </div>
    
</form>

<div class="row">
    <div class="col-sm-3">
        <div class="list-group">
          <a class="list-group-item" href="#">Аренда недвижимости</a>
          <a class="list-group-item" href="{{ url('order-filter?type=1') }}"> - Коммерческая</a>
          <a class="list-group-item" href="{{ url('order-filter?structure=1') }}"> - - Склады</a>
          <a class="list-group-item" href="{{ url('order-filter?structure=3') }}"> - - Офисы</a>
          <a class="list-group-item" href="{{ url('order-filter?structure=5') }}"> - - Ангары</a>
          <a class="list-group-item" href="{{ url('order-filter?type=2') }}"> - Некоммерческая</a>
          <a class="list-group-item" href="{{ url('order-filter?structure=5') }}"> - - Комнаты</a>
          <a class="list-group-item" href="{{ url('order-filter?structure=2') }}"> - - Квартиры</a>
          <a class="list-group-item" href="{{ url('order-filter?structure=6') }}"> - - Дома</a>
          <!-- <a class="list-group-item" href="/orders/index/?type=3"> - Другое</a> -->
        </div>
    </div>
    <div class="col-sm-9">
        @if($orders)
        <table class="table table-striped table-condensed">
        <thead>
            <tr>
            <th>ФИО, телефон</th>
            <th>Тип</th>
            <th>Вид</th>
            <th>Площадь (м&sup2;)</th>
            <th>Цена (руб.)</th>
            <th>Описание</th>
            <th>Создана</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->name }}<br>{{ $order->phone }}</td>
            <td>{{ $order->orderType->type }}</td>
            <td>{{ $order->orderStructure->structure }}</td>
            <td>{{ $order->area }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->description }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
        @else
        <p>Список заявок пуст.</p>
        @endif

    </div>
</div>
@endsection