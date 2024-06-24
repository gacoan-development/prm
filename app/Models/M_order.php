<?php
namespace App\Models;
use CodeIgniter\Model;

class M_order extends Model
{  
    public function get_all(){
        $where_params = [
            'is_active' => '1'
        ];
        return $this->db->table('torder a')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_data_by_id($order_id){
        $where_params = [
            'a.order_id' => $order_id
        ];
        return $this->db->table('torder a')
                        // ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function simpan_form_order($data, $user_nik){
        // generate order type code
        $next_order_code = $this->db->table('torder a')
                                    ->select('MAX(a.order_id)+1 AS next_order_code')
                                    ->get()->getResult();
        $order_code = $next_order_code[0]->next_order_code;
        switch(strlen($order_code)){
            case 1:
                $order_code = 'ORD00'.$order_code;
            break;
            case 2:
                $order_code = 'ORD0'.$order_code;
            break;
            default:
                $order_code = 'ORD'.$order_code;
            break;
        }
        $order_name = $order_service = $is_active = $create_by = '';

        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_order":
                    $order_name = $value['value'];
                break;
                case "jenis_layanan_order":
                    $order_service = $value['value'];
                break;
            }
        }
        $is_active = '1';
        $create_by = $user_nik;
        $create_date = date('Y-m-d H:i:s');
        $insert_data = [
            'order_code' => $order_code,
            'order_name' => $order_name,
            'order_service' => $order_service,
            'is_active' => $is_active,
            'create_by' => $create_by,
            'create_date' => $create_date
        ];
        $this->db->table('torder')
                    ->insert($insert_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }

    public function update_form_order($data, $user_nik, $order_id){
        $order_name = $order_service = $is_active = $modified_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_order":
                    $order_name = $value['value'];
                break;
                case "jenis_layanan_order":
                    $order_service = $value['value'];
                break;
            }
        }
        $is_active = '1';
        $modified_by = $user_nik;
        $modified_date = date('Y-m-d H:i:s');
        $update_data = [
            'order_name' => $order_name,
            'order_service' => $order_service,
            'is_active' => $is_active,
            'modified_by' => $modified_by,
            'modified_date' => $modified_date
        ];
        $this->db->table('torder a')
                    ->where('a.order_id', $order_id)
                    ->update($update_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }
}

?>