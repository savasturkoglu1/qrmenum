<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Images;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class imageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder=strval($request->img_menu_id % 10);

        if (!file_exists('images/'.$folder)) {
            mkdir('images/'.$folder, 0777, true);

        }

        $base = 'images/'.$folder.'/';
        $files = $request->file('image');

        foreach($files as $res) {

            $ad = $res->getClientOriginalName();
            $resSpi = explode('.', $ad);
            $new = $resSpi[0] . '.jpeg';
            $img = Image::make($res)->encode('jpeg', 75);
            $img->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });



            $img->save($base . $new);


            $path = $base . $new;
            $url = url('/') . '/' . $path;



            $reek = Images::create([
                'img_name' => $new,
                'img_url' => $url,
                'img_path' => $path,
                'img_status' => 1,
                'img_tag' => $request->img_tag,
                'img_menu_id' => $request->img_menu_id

            ]);

        }

        return redirect('/panel/menu/'.$request->img_menu_id.'/edit');
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
        //
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

    }

    public function sirala(Request $request)
    {
          $img= Images::find($request->id);
          $img->update(['img_sira'=>$request->num]);

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Images::destroy($id);
    }
}
