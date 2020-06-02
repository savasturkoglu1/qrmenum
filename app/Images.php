<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table    = 'images';
    protected $fillable = [  'img_menu_id', 'img_name', 'img_path', 'img_url', 'img_status', 'img_tag', 'img_sira'];
    public $timestamps = false;

}
