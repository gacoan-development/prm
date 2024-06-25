<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_groupResto;

class GroupResto extends BaseController
{
    public function index()
    {
        //
    }

    public function group_resto_page(){
        return view('group_resto/display_group_resto');
    }

    public function get_group_resto_list(){
        $mgroupresto = new M_groupResto();
        $result = $mgroupresto->get_all();
        return json_encode($result);
    }

    public function form_group_resto(){
        $branch_group_id = $this->request->getGet('id');
        $data = [
            'branch_group_id' => $branch_group_id
        ];
        return view('group_resto/form_group_resto', $data);
    }

    public function get_data_by_id(){
        if($this->request->getPost('branch_group_id') != null){
            $branch_group_id = $this->request->getPost('branch_group_id');
            $mgroupresto = new M_groupResto();
            $result = $mgroupresto->get_data_by_id($branch_group_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function simpan_form_group_resto(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $mgroupresto = new M_groupResto();
            $result = $mgroupresto->simpan_form_group_resto($data, $user_nik);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function update_form_group_resto(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $branch_group_id = $this->request->getPost('branch_group_id');
            $mgroupresto = new M_groupResto();
            $result = $mgroupresto->update_form_group_resto($data, $user_nik, $branch_group_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }
}
