<?php

namespace App\Controllers;
use App\Models\M_resto;

class Master extends BaseController
{
    public function resto_page(){
        return view('master/display_resto');
    }

    public function get_resto_list(){
        $mresto = new M_resto();
        $activeResto = $mresto->get_all_active_resto();

        return json_encode($activeResto);
    }
}