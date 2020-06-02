<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class indexController extends Controller
{

            public function index(){

                $menu = Menu::paginate(15);
                return view('admin.index', compact('menu'));
            }

}
