<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderType;
use App\Models\OrderStructure;
use App\Http\Requests\AddOrderRequest;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();

        return view('admin.order_list', compact('orders', 'orderTypes', 'orderStructures'));
    }

    public function editForm($id){
        $order = Order::findOrFail($id);
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();

        return view('admin.order_edit_form', compact('order', 'orderTypes', 'orderStructures'));
    }

    public function editOrder(AddOrderRequest $request){
        $data = $request->all();
        $order = Order::findOrFail($data['id']);

        if($order){
            $order->update($data);
            return redirect()->route('orders');
        }else{
            return back()->withErrors(['msg' => 'Ошибка редактирования заявки.']);
        }
    }
    
    public function addForm(){
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();

        return view('admin.order_add_form', compact('orderTypes', 'orderStructures'));
    }

    public function addOrder(AddOrderRequest $request){
        $data = $request->all();
        $order = (new Order)->fill($data);

        if($order){
            $order->save($data);
            return redirect()->route('orders');
        }else{
            return back()->withErrors(['msg' => 'Ошибка создания заявки.']);
        }
    }

    public function deleteOrders(Request $request){
        $data = $request->all();
        $ids = [];
        
        foreach($data as $key => $id){
            if(preg_match('/(order-)[0-9]+/', $key)) $ids[] = $id;
        }
        
        foreach($ids as $id){
            Order::destroy($id);
        }

        return redirect()->route('orders');
    }

    public function filterOrders(Request $request){
        $orderTypes = OrderType::select(['id', 'type'])->get();
        $orderStructures = OrderStructure::select(['id', 'structure'])->get();
        
        $filterData = $request->all();
        $filterRules = [];
   
        if(isset($filterData['type']) && $filterData['type'] > 0) $filterRules[] = ['type', '=', $filterData['type']];
        if(isset($filterData['structure']) && $filterData['structure'] > 0) $filterRules[] = ['structure', '=', $filterData['structure']];
        if(isset($filterData['area']) && $filterData['area'] > 0) $filterRules[] = ['area', '=', $filterData['area']];

        if(isset($filterData['price']) && $filterData['price'] > 0) $filterRules[] = ['price', '=', $filterData['price']];
        if(isset($filterData['status']) && $filterData['status'] > 0) $filterRules[] = ['status', '=', $filterData['status']];
        
        $orders = Order::where($filterRules)->get();

        return view('admin.order_list', compact('orders', 'orderTypes', 'orderStructures'));
    }
}
