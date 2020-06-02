<?php

namespace App\Http\Controllers\admin;


use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Images;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addcustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['res_slug'] =Str::random(20);
        $ekle = Menu::create($request->all());

        if($ekle) {

            return redirect('/panel/menu/'.$ekle->id.'/edit');

        } else {
            return redirect('/panel/menu/create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $images = Images::where('img_menu_id', $id)->orderBy('img_sira','asc')->get();

        return view('admin.customer',compact('menu','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->update($request->all());
        return redirect('/panel/menu/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sil= Menu::destroy($id);
        return redirect(url('/panel'));
    }

    public function del($id)
    {
        $sil= Menu::destroy($id);
        return redirect(url('/panel'));
    }
}
