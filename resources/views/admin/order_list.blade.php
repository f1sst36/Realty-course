@extends('admin.layout')
@section('content')


<div class="pull-right">
@if(isset($accesses[7]))
  <a href="{{ route('addOrderForm') }}" class="btn btn-default" title="Добавить">
    <span class="glyphicon glyphicon-plus"></span>
  </a>
@endif
@if(isset($accesses[8]))
  <button type="button" class="btn btn-default" id="btn_delete" title="Удалить">
    <span class="glyphicon glyphicon-trash"></span>
  </button>
@endif
</div>
<h1 class="h3">Список заказов</h1>
<div class="clearfix"></div>
<hr>

<form method="get" action="{{ route('filterOrders') }}">
@csrf
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
              <input name="area" type="text" class="form-control" value="" placeholder="Площадь">
          </div>
        </div>
                
        <div class="col-sm-2">
          <div class="form-group">
              <label>Цена <span class="text-danger">*</span></label>
              <input name="price" type="text" class="form-control" value="" placeholder="Цена">
          </div>
        </div>
                
        <div class="col-sm-2">
          <div class="form-group">
            <label>Статус <span class="text-danger">*</span></label>
            <select name="status" id="status" class="form-control">
                <option value="0">Показать все</option>
                <option value="1">На рассмотрении</option>
                <option value="2">Опубликовано</option>
            </select>
          </div>
        </div>
                
        <div class="col-sm-1">
          <button type="submit" class="btn btn-success btn-block" style="margin-top: 25px;">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
                
        <div class="col-sm-1">
          <a href="{{ route('orders') }}" class="btn btn-default btn-block" style="margin-top: 25px;">
            <span class="glyphicon glyphicon-refresh"></span>
          </a>
        </div>
        </form>
    </div>
    @if(isset($accesses[8]))
@if($orders->isNotEmpty())
<form id="form_delete" method="post" action="{{ route('deleteOrders') }}">
@csrf
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th><input type="checkbox" class="sell_all"></th>
            <th>№</th>
            <th>ФИО</th>
            <th>Телефон</th>
            <th>Тип</th>
            <th>Вид</th>
            <th>Площадь (м&sup2;)</th>
            <th>Цена (руб.)</th>
            <th>Описание</th>
            <th>Создан</th>
            <th>Статус</th>
          </tr>
        </thead>
        <tbody>
        
@foreach($orders as $order)
        <tr>
          <td><input type="checkbox" name="order-{{ $order->id }}" class="sell_item" value="{{ $order->id }}"></td>
          @if(isset($accesses[9]))
          <td><a href="{{ route('editOrderForm', $order->id) }}">{{ sprintf("%04d", $order->id) }}</a></td>
          @else
          <td>{{ sprintf("%04d", $order->id) }}</td>
          @endif
          <td>{{ $order->name }}</td>
          <td>{{ $order->phone }}</td>
          <td>{{ $order->orderType->type }}</td>
          <td>{{ $order->orderStructure->structure }}</td>
          <td>{{ $order->area }}</td>
          <td>{{ $order->price }}</td>
          <td>{{ $order->description }}</td>
          <td>{{ $order->created_at }}</td>
          <td>
            @if($order->status == 1) 
                 На рассмотрении
            @elseif($order->status == 2)
                Опубликовано
            @else
                Не известно
            @endif
          </td>
        </tr>
@endforeach

</tbody>
      </table>
    </form>


@else
<p>Список заказов пуст.</p>
@endif

@else
<p>Список заказов недоступен.</p>
@endif


<script>
$(function() {
    $(".sell_all").change(function() {
        if($(this).prop("checked") == true) {
            $(".sell_item").each(function(){
                $(this).prop("checked", true);
            });
        } else {
            $(".sell_item").each(function(){
                $(this).prop("checked", false);
            });
        }
    });
    $("#btn_delete").click(function() {
        $("#form_delete").submit();
    });
});
</script>
@endsection