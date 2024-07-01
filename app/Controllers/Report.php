<?php 
namespace App\Controllers;
use App\Models\M_report;

class Report extends BaseController
{
    public function receive_fee_page(){
        return view('report/display_receive_fee');
    }

    public function receive_fee_get_all(){
        $date_receive_fee = $this->request->getPost('date_receive_fee');
        $mreport = new M_report();
        $result = $mreport->get_receive_fee_all($date_receive_fee);
        return json_encode($result);
    }
}
?>