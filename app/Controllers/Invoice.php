<?php
namespace App\Controllers;
use App\Models\M_invoice;

class Invoice extends BaseController
{
    public function invoice_page(){
        return view('invoice/display_invoice');
    }

    public function get_invoice_list(){
        $date_invoice = $this->request->getPost('date_invoice');
        $minvoice = new M_invoice();
        $result = $minvoice->get_all($date_invoice);
        return json_encode($result);
    }

    public function form_invoice(){
        $invoice_id = $this->request->getGet('invoice');
        $data = [
            'invoice_id' => $invoice_id
        ];
        return view('invoice/form_invoice', $data);
    }

    public function get_all_resto(){
        if($this->request->getGet('term') != null){
            $search_term = $this->request->getGet('term');
            $minvoice = new M_invoice();
            $result = $minvoice->get_all_resto($search_term);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function get_resto_detail(){
        if($this->request->getGet('branch_id') != null){
            $branch_id = $this->request->getGet('branch_id');
            $minvoice = new M_invoice();
            $result = $minvoice->get_resto_detail($branch_id);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function check_invoice_number(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $minvoice = new M_invoice();
        $result = $minvoice->check_invoice_number($branch_id, $inv_date);
        return json_encode($result);
    }

    public function save_invoice_header(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $minvoice = new M_invoice();
        $result = $minvoice->save_invoice_header($branch_id, $inv_date);
        return json_encode($result);
    }
}

?>