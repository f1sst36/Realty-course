<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Article;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();

        return view('admin.menu_list', compact('menus'));
    }

    public function createMenuForm(){
        $menuTypes = [
            1 => 'Материал',
            2 => 'Форма заявки',
            3 => 'Карта сайта',
            4 => 'Аренда недвижимости',
            5 => 'Новости',
            6 => 'О компании',
        ];
        $menus = Menu::all();
        $articles = Article::all();

        return view('admin.menu_add_form', compact('menus', 'menuTypes', 'articles'));
    }

    public function createMenuItem(Request $request){
        $data = $request->all();
        if(strlen($data['title']) < 3) 
            return back()->withErrors(['msg' => 'Наименование должно быть больше 3 символов.']);
        if(strlen($data['title']) > 50) 
            return back()->withErrors(['msg' => 'Наименование должно быть меньше 50 символов.']);
        if(strlen($data['order']) < 0) 
            return back()->withErrors(['msg' => 'Порядок отображения должен быть не меньше нуля.']);
        if($data['type'] == 1 && $data['material_id'] == 0) 
            return back()->withErrors(['msg' => 'Для данного типа страницы должна быть выбрана статья.']);
        
        $menuItem = (new Menu)->fill($data);
        $menuItem->slug = Str::slug($menuItem->title, '-');
        if($menuItem){
            $menuItem->save();
            return redirect()->route('menus')->with(['msg' => 'Пункт меню '. $menuItem->title .' успешно создан.']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка при создании пункта меню.']);
        }
    }

    public function editMenuItemForm($id){
        $currentMenu = Menu::findOrFail($id);
        $menuTypes = [
            1 => 'Материал',
            2 => 'Форма заявки',
            3 => 'Карта сайта',
            4 => 'Аренда недвижимости',
            5 => 'Новости',
            6 => 'О компании',
        ];
        $menus = Menu::all();
        $articles = Article::all();

        return view('admin.menu_edit_form', compact('currentMenu', 'menus', 'menuTypes', 'articles'));
    }

    public function editMenuItem(Request $request){
        $data = $request->all();
        if(strlen($data['title']) < 3) 
            return back()->withErrors(['msg' => 'Наименование должно быть больше 3 символов.']);
        if(strlen($data['title']) > 50) 
            return back()->withErrors(['msg' => 'Наименование должно быть меньше 50 символов.']);
        if(strlen($data['order']) < 0) 
            return back()->withErrors(['msg' => 'Порядок отображения должен быть не меньше нуля.']);
        if($data['type'] == 1 && $data['material_id'] == 0) 
            return back()->withErrors(['msg' => 'Для данного типа страницы должна быть выбрана статья.']);
        
        $menuItem = Menu::findOrFail($data['id']);
        //(new Menu)::where('parent_id', '=', $data['parent_id'])->first()
        $menuItem->fill($data);
        if($menuItem){
            $menuItem->save();
            return redirect()->route('menus')->with(['msg' => 'Пункт меню '. $menuItem->title .' успешно отредактирован.']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка при редактировании пункта меню.']);
        }
    }

    public function deleteMenu(Request $request){
        $data = $request->all();
        $ids = [];
        
        foreach($data as $key => $id){
            if(preg_match('/(menu-)[0-9]+/', $key)) $ids[] = $id;
        }
        
        foreach($ids as $id){
            Menu::destroy($id);
        }

        return redirect()->route('menus')->with(['success' => 'Было удалено '. count($ids) .' пунктов меню.']);
    }
}
