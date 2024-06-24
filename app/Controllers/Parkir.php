<?php 
namespace App\Controllers;
use App\Models\M_parkir;

class Parkir extends BaseController
{
    public function tarif_parkir_page(){
        return view('parkir/display_tarif_parkir');
    }

    public function get_tarif_parkir_list(){
        $mparkir = new M_parkir();
        $result = $mparkir->get_all();
        return json_encode($result);
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
}
?>