<?php 
namespace App\Controllers;
use App\Models\M_bills;

class Bills extends BaseController
{
    public function bills_page(){
        return view('bills/display_bills');
    }
}
?>