<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_order;

class Order extends BaseController
{
    public function index()
    {
        //
    }

    public function order_type_page(){
        return view('order_type/display_order_type');
    }

    public function get_order_type_list(){
        $morder = new M_order();
        $result = $morder->get_all();
        return json_encode($result);
    }

    public function form_order_type(){
        $order_id = $this->request->getGet('order');
        $data = [
            'order_id' => $order_id
        ];
        return view('order_type/form_order_type', $data);
    }

    public function get_data_by_id(){
        if($this->request->getPost('order_id') != null){
            $order_id = $this->request->getPost('order_id');
            $morder = new M_order();
            $result = $morder->get_data_by_id($order_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function simpan_form_order(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $morder = new M_order();
            $result = $morder->simpan_form_order($data, $user_nik);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function update_form_order(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $order_id = $this->request->getPost('order_id');
            $morder = new M_order();
            $result = $morder->update_form_order($data, $user_nik, $order_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }
}
