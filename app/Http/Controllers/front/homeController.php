<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Images;
use App\Menu;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function menu($slug){
        $menu = Menu::where('res_slug',$slug)->first();
        $images = Images::where('img_menu_id', $menu->id)->orderBy('img_sira','asc')->get();
        return view('front.menu',compact('menu','images'));
    }
}
