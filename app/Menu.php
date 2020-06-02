<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table    = 'rest';
    protected $fillable = [  'res_name', 'res_status', 'res_eposta', 'res_adres', 'res_contact', 'res_slug','res_not', 'res_tel', 'created_at', 'updated_at'];

}
