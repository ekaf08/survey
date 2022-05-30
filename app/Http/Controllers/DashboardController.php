<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Incident;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class DashboardController extends Controller
{

    public function index()
    {
        $idrole = Auth::user()->id_role;
        $menu   = Menu::menu_roles($idrole); 
  
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'menu'  => $menu,
            'role' => $idrole
        ]);
    }
}
