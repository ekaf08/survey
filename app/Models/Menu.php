<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
    use HasFactory;

    public static function cek_child($id_parent){
        $menu = DB::table('roles')
        ->select('m_menu.*')
        ->join('m_menu', 'm_menu.id', '=', 'roles.id_menu')
        ->where(['id_parent' => $id_parent])->orderBy('m_menu.order', 'asc')
        ->get();
        return $menu;
    }

    public static function menu_roles($roles){
        $menu = DB::table('roles')
        ->select('m_menu.*')
        ->join('m_menu', 'm_menu.id', '=', 'roles.id_menu')
        ->where(['roles.id_roles' => $roles,'id_parent' => null])->orderBy('m_menu.order','asc')
        ->get();
        return $menu;
    }

    public static function submenu_roles($roles,$parent)
    {
        $menu = DB::table('roles')
        ->select('m_menu.*')
        ->join('m_menu', 'm_menu.id', '=', 'roles.id_menu')
        ->where(['roles.id_roles' => $roles, 'id_parent' => $parent])->orderBy('m_menu.order', 'asc')
            ->get();
        return $menu;
    }
}
