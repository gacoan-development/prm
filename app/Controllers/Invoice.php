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
        $inv_id = $this->request->getGet('invoice');
        $data = [
            'inv_id' => $inv_id
        ];
        return view('invoice/form_invoice', $data);
    }

    public function get_all_resto(){
        if($this->request->getPost('term') != null){
            $search_term = $this->request->getPost('term');
            $user_group_code = $this->request->getPost('user_group_code');
            $managerial_area_list = $this->request->getPost('managerial_area_list');
            $minvoice = new M_invoice();
            $result = $minvoice->get_all_resto($search_term, $user_group_code, $managerial_area_list);
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

    public function check_fee_header(){
        $branch_id = $this->request->getPost('branch_id');
        $minvoice = new M_invoice();
        $result = $minvoice->check_fee_header($branch_id);
        echo json_encode($result);
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
        $user_nik = $this->request->getPost('user_nik');
        $inv_note = $this->request->getPost('inv_note');
        $minvoice = new M_invoice();
        $result = $minvoice->save_invoice_header($branch_id, $inv_date, $user_nik, $inv_note);
        return json_encode($result);
    }

    public function resto_dashboard_invoice(){
        return view('invoice/resto_dashboard_invoice');
    }

    public function load_existing_invoice(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $minvoice = new M_invoice();
        $result = $minvoice->load_existing_invoice($branch_id, $inv_date);
        return json_encode($result);
    }

    public function get_format_tarif(){
        $branch_id = $this->request->getPost('branch_id');
        $minvoice = new M_invoice();
        $result = $minvoice->get_format_tarif($branch_id);
        return json_encode($result);
    }

    public function print_flat(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        // $checked_id = $this->request->getPost('checked_outstanding_invoice');
        $data = [];
        $minvoice = new M_invoice();
        $data['existing_invoice'] = $minvoice->load_existing_invoice($branch_id, $inv_date);
        $data['branch_id'] = $branch_id;
        $data['inv_date'] = $inv_date;

        // if($checked_id != ''){
        //     $data['selected_outstanding'] = $minvoice->selected_outstanding($checked_id);
        // }else{
        //     $data['selected_outstanding'] = [];
        // }
        return view('invoice/print/flat', $data);
    }

    public function print_persen(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        // $checked_id = $this->request->getPost('checked_outstanding_invoice');
        $data = [];
        $minvoice = new M_invoice();
        $data['existing_invoice'] = $minvoice->load_detailed_invoice($branch_id, $inv_date);
        $data['branch_id'] = $branch_id;
        $data['inv_date'] = $inv_date;
        // if($checked_id != ''){
        //     $data['selected_outstanding'] = $minvoice->selected_outstanding($checked_id);
        // }else{
        //     $data['selected_outstanding'] = [];
        // }
        return view('invoice/print/persen', $data);
    }

    public function outstanding_invoice_list(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $minvoice = new M_invoice();
        $result = $minvoice->outstanding_invoice_list($branch_id, $inv_date);
        return json_encode($result);
    }

    public function update_invoice_header(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $user_nik = $this->request->getPost('user_nik');
        $inv_note = $this->request->getPost('inv_note');
        $billed_nominal = $this->request->getPost('billed_nominal');
        $pay_off_nominal = $this->request->getPost('pay_off_nominal');
        $minvoice = new M_invoice();
        $result = $minvoice->update_invoice_header($branch_id, $inv_date, $user_nik, $inv_note, $billed_nominal, $pay_off_nominal);
        return json_encode($result);
    }

    public function update_invoice_detail(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $user_nik = $this->request->getPost('user_nik');
        $compInvoiceDetail = $this->request->getPost('compInvoiceDetail');
        $minvoice = new M_invoice();
        $result = $minvoice->update_invoice_detail($branch_id, $inv_date, $user_nik, $compInvoiceDetail);
        return json_encode($result);
    }

    public function upload_invoice(){
        $file = $this->request->getFile('invoice_file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Generate a random name
            $file->move(WRITEPATH . 'inv_attachments', $newName); // Move the file to the upload directory

            return $this->response->setJSON(['success' => true, 'message' => $newName]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to upload data']);
        }
    }

    public function update_uploaded_invoice(){
        $inv_id_upload = $this->request->getPost('inv_id_upload');
        $filename = $this->request->getPost('filename');
        $setoran_invoice = $this->request->getPost('setoran_invoice');
        $selisih_invoice = $this->request->getPost('selisih_invoice');
        $minvoice = new M_invoice();
        $result = $minvoice->update_uploaded_invoice($inv_id_upload, $filename, $setoran_invoice, $selisih_invoice);
        return json_encode($result);
    }

    public function update_selected_outstanding_invoice(){
        $outstanding_compilation = $this->request->getPost('outstanding_comp');
        $inv_id_upload = $this->request->getPost('inv_id_upload');
        $minvoice = new M_invoice();
        $result = $minvoice->update_selected_outstanding_invoice($outstanding_compilation, $inv_id_upload);
        return json_encode($result);
    }

    public function get_all_outstanding(){
        $branch_id = $this->request->getPost('branch_id');
        $inv_date = $this->request->getPost('inv_date');
        $minvoice = new M_invoice();
        $result = $minvoice->get_all_outstanding($branch_id, $inv_date);
        return json_encode($result);
    }

    public function get_data_by_id(){
        $inv_id = $this->request->getPost('inv_id');
        $minvoice = new M_invoice();
        $result = $minvoice->get_data_by_id($inv_id);
        return json_encode($result);
    }

    public function get_managerial_area(){
        $user_group_code = $this->request->getPost('user_group_code');
        $managerial_area_list = $this->request->getPost('managerial_area_list');
        $minvoice = new M_invoice();
        $result = $minvoice->get_managerial_area($user_group_code, $managerial_area_list);
        return json_encode($result);
    }
    
}

?>