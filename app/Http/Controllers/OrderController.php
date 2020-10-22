<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderType;
use App\Models\OrderStructure;
use App\Http\Requests\AddOrderRequest;

class OrderController extends Controller
{
    public function createForm(){
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();
        $menuItems = Menu::setHierarchy();

        return view('order_add_form', compact('orderTypes', 'orderStructures', 'menuItems'));
    }

    public function addOrder(AddOrderRequest $request){
        $order = (new Order)->fill($request->all());
        
        if($order){
            $order->save();
            return redirect()->route('realtyInfo');
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания заявки.']);
        }
    }

    public function orderList(){
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();
        $orders = Order::with(['orderType:id,type', 'orderStructure:id,structure'])->where('status', '=', 2)->get();
        $menuItems = Menu::setHierarchy();

        return view('orders_list', compact('orders', 'orderTypes', 'orderStructures', 'menuItems'));
    }

    public function orderFilter(Request $request){
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();
        
        $filterData = $request->all();
        $filterRules = [];
   
        if(isset($filterData['type']) && $filterData['type'] > 0) $filterRules[] = ['type', '=', $filterData['type']];
        if(isset($filterData['structure']) && $filterData['structure'] > 0) $filterRules[] = ['structure', '=', $filterData['structure']];
        if(isset($filterData['area']) && $filterData['area'] > 0) $filterRules[] = ['area', '=', $filterData['area']];

        if(isset($filterData['minPrice']) && $filterData['minPrice'] > 0) $filterRules[] = ['price', '>', $filterData['minPrice']];
        if(isset($filterData['maxPrice']) && $filterData['maxPrice'] > 0) $filterRules[] = ['price', '<=', $filterData['maxPrice']];
        $filterRules[] = ['status', '=', 2];
        $menuItems = Menu::setHierarchy();
        
        $orders = Order::where($filterRules)->get();

        return view('orders_list', compact('orders', 'orderTypes', 'orderStructures', 'menuItems'));
    }
}
