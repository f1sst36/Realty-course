<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'material_id',
        'slug',
        'parent_id',
        'order',
        'homepage',
    ];

    public function pathForType($childMenuItem){
        switch ($childMenuItem->type) {
            case 1:
                return 'home';
            case 2:
                return 'orderForm';
            case 3:
                return 'map';
            case 4:
                return 'orderList';
            case 5:
                return 'acticles';
            case 6:
                return 'about';
            
            default:
                return 'home';
        }
    } 

    public function viewForType($childMenuItem){
        switch ($childMenuItem->type) {
            case 1:
                return 'home';
            case 2:
                return 'order_add_form';
            case 3:
                return 'map';
            case 4:
                return 'order_list';
            case 5:
                return 'news';
            case 6:
                return 'about';
            
            default:
                return 'home';
        }
    } 

    public static function setHierarchy(){
        $menuItems = Menu::orderBy('order')->get();
        foreach($menuItems as $menuItem)
            $menuItem->childs = collect();

        foreach($menuItems as $menuItem){
            if($menuItem->parent_id != 0) {
                $item = $menuItems->firstWhere('id', '=', $menuItem->parent_id);
                $item->childs->push($menuItem);
            }
        }

        return $menuItems;
    }
}
