<?php
namespace App\Models;
use CodeIgniter\Model;

class M_groupResto extends Model
{  
    public function get_all(){
        $where_params = [
            // 'is_active' => '1'
        ];
        return $this->db->table('tbranch_group a')
                        // ->where($where_params)
                        ->get()->getResult();
    }

    public function get_data_by_id($branch_group_id){
        $where_params = [
            'a.branch_group_id' => $branch_group_id
        ];
        return $this->db->table('tbranch_group a')
                        // ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function simpan_form_group_resto($data, $user_nik){
        // generate order type code
        $next_order_code = $this->db->table('tbranch_group a')
                                    ->select('MAX(a.branch_group_id)+1 AS next_order_code')
                                    ->get()->getResult();
        $order_code = $next_order_code[0]->next_order_code;
        switch(strlen($order_code)){
            case 1:
                $order_code = 'R000'.$order_code;
            break;
            case 2:
                $order_code = 'R00'.$order_code;
            break;
            default:
                $order_code = 'R0'.$order_code;
            break;
        }
        $branch_group_name = $create_by = '';

        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_group_resto":
                    $branch_group_name = $value['value'];
                break;
                // case "jenis_layanan_order":
                //     $order_service = $value['value'];
                // break;
            }
        }
        // $is_active = '1';
        $create_by = $user_nik;
        $create_date = date('Y-m-d H:i:s');
        $insert_data = [
            'branch_group_code' => $order_code,
            'branch_group_name' => $branch_group_name,
            'create_by' => $create_by,
            'create_date' => $create_date
        ];
        $this->db->table('tbranch_group')
                    ->insert($insert_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }

    public function update_form_group_resto($data, $user_nik, $branch_group_id){
        $order_name = $modified_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_group_resto":
                    $branch_group_name = $value['value'];
                break;
                // case "jenis_layanan_order":
                //     $order_service = $value['value'];
                // break;
            }
        }
        // $is_active = '1';
        $modified_by = $user_nik;
        $modified_date = date('Y-m-d H:i:s');
        $update_data = [
            'branch_group_name' => $branch_group_name,
            'modified_by' => $modified_by,
            'modified_date' => $modified_date
        ];
        $this->db->table('tbranch_group a')
                    ->where('a.branch_group_id', $branch_group_id)
                    ->update($update_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }
}

?>