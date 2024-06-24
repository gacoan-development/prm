<?php

namespace App\Controllers;
use App\Models\M_resto;

class Resto extends BaseController
{
    public function resto_page(){
        return view('resto/display_resto');
    }

    public function get_resto_list(){
        $mresto = new M_resto();
        $activeResto = $mresto->get_all_active_resto();

        return json_encode($activeResto);
    }

    public function form_resto(){
        $branch_id = $this->request->getGet('id');
        $data = [
            'branch_id' => $branch_id
        ];
        return view('resto/form_resto', $data);
    }

    public function get_master_area(){
        $mresto = new M_resto();
        $result = $mresto->get_master_area();
        return json_encode($result);
    }

    public function get_master_revenue_type(){
        $mresto = new M_resto();
        $result = $mresto->get_master_revenue_type();
        return json_encode($result);
    }

    public function get_master_pengelola(){
        if($this->request->getGet('term') != null){
            $search_term = $this->request->getGet('term');
            $mresto = new M_resto();
            $result = $mresto->get_master_pengelola($search_term);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function get_duplicate_code(){
        if($this->request->getGet('resto_code') != null){
            $branch_code = $this->request->getGet('resto_code');
            $mresto = new M_resto();
            $result = $mresto->get_duplicate_code($branch_code);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function save_form_resto(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $mresto = new M_resto();
            $result = $mresto->save_form_resto($data, $user_nik);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function get_data_by_id(){
        if($this->request->getPost('branch_id') != null){
            $branch_id = $this->request->getPost('branch_id');
            $mresto = new M_resto();
            $result = $mresto->get_data_by_id($branch_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function update_form_resto(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $branch_id = $this->request->getPost('branch_id');
            $mresto = new M_resto();
            $result = $mresto->update_form_resto($data, $user_nik, $branch_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }
}