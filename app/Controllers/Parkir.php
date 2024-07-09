<?php 
namespace App\Controllers;
use App\Models\M_parkir;

class Parkir extends BaseController
{
    public function tarif_parkir_page(){
        return view('parkir/display_tarif_parkir');
    }

    public function get_all(){
        $filter = $this->request->getPost('filter');
        $mparkir = new M_parkir();
        $result = $mparkir->get_all($filter);
        return json_encode($result);
    }

    public function get_all_resto(){
        if($this->request->getPost('term') != null){
            $search_term = $this->request->getPost('term');
            $mparkir = new M_parkir();
            $result = $mparkir->get_all_resto($search_term);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function form_parkir(){
        $branch_id = $this->request->getGet('branch');
        $fee_id = $this->request->getGet('fee');
        $data = [
            'branch_id' => $branch_id,
            'fee_id' => $fee_id
        ];
        return view('parkir/form_tarif_parkir', $data);
    }

    public function get_fee(){
        $fee_id = $this->request->getPost('fee_id');
        $mparkir = new M_parkir();
        $result = $mparkir->get_fee($fee_id);
        return json_encode($result);
    }


    public function get_data_by_id(){
        if($this->request->getPost('branch_id') != null){
            $branch_id = $this->request->getPost('branch_id');
            $mparkir = new M_parkir();
            $result = $mparkir->get_data_by_id($branch_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function get_master_order(){
        $mparkir = new M_parkir();
        $result = $mparkir->get_master_order();
        return json_encode($result);
    }

    public function get_master_revenue_type(){
        $mparkir = new M_parkir();
        $result = $mparkir->get_master_revenue_type();
        return json_encode($result);
    }

    public function get_fee_history(){
        if($this->request->getPost('branch_id') != null){
            $branch_id = $this->request->getPost('branch_id');
            $mparkir = new M_parkir();
            $result = $mparkir->get_fee_history($branch_id);
            return json_encode($result);
        }else{
            return 'failed to fetch get fee history data.';
        }
    }

    public function simpan_tarif_parkir(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $branch_id = $this->request->getPost('branch_id');
            $mparkir = new M_parkir();
            $result = $mparkir->simpan_form_tarif_parkir($data, $user_nik, $branch_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function update_tarif_parkir(){
        if($this->request->getPost('data') != null){
            $fee_id = $this->request->getPost('fee_id');
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $branch_id = $this->request->getPost('branch_id');
            $mparkir = new M_parkir();
            $result = $mparkir->update_form_tarif_parkir($fee_id, $data, $user_nik, $branch_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function check_fee_active(){
        $branch_id = $this->request->getPost('branch_id');
        $mparkir = new M_parkir();
        $result = $mparkir->check_fee_active($branch_id);
        echo json_encode($result);
    }

    public function upload_tarif(){
        $file = $this->request->getFile('tarif_file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Generate a random name
            $file->move(WRITEPATH . 'fee_attachments', $newName); // Move the file to the upload directory

            return $this->response->setJSON(['success' => true, 'message' => $newName]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to upload data']);
        }
    }

    public function update_uploaded_tarif(){
        $fee_id_upload = $this->request->getPost('fee_id_upload');
        $filename = $this->request->getPost('filename');
        $mparkir = new M_parkir();
        $result = $mparkir->update_uploaded_tarif($fee_id_upload, $filename);
        return json_encode($result);
    }
}
?>