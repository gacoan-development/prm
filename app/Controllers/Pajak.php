<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_pajak;

class Pajak extends BaseController
{
    public function index()
    {
        //
    }

    public function pajak_page(){
        return view('pajak/display_pajak');
    }

    public function get_pajak_list(){
        $mpajak = new M_pajak();
        $result = $mpajak->get_all();
        return json_encode($result);
    }
}
