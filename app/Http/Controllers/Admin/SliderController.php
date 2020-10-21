<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;

class SliderController extends Controller
{
    public function index(){
        $images = DB::table('slider_imgs')->get();
        $accesses = User::getAccesses();

        return view('admin.slider', compact('images', 'accesses'));
    }

    public function uploadImageOrDelete(Request $request){
        $data = $request->all();
        foreach($data as $key => $item){
            if(preg_match('/(image-)[0-9]+/', $key)){
                $imageName = time().'-'.$key.'.'.$request->$key->getClientOriginalExtension();
                DB::table('slider_imgs')->insert(['path' => 'img/slider/'.$imageName]);
                $request->$key->move(public_path('img/slider'), $imageName);
            }
            if(preg_match('/(images_delete-)[0-9]+/', $key)){
                $imgPath = DB::table('slider_imgs')->where('id', '=', $item)->first()->path;
                if(File::exists($imgPath)) {
                    File::delete($imgPath);
                }

                DB::table('slider_imgs')->where('id', '=', $item)->delete();
            }
        }
    
        return redirect()->route('slider');
    }
}
