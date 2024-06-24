<?php

namespace App\Models;
use CodeIgniter\Model;

class M_groupResto extends Model
{
    public function get_all_active_resto(){
        $where_params = array(
            // 'a.is_active' => '1'
        );
        return $this->db->table('tbranch a')
                        ->select('a.branch_id, a.branch_code, a.branch_name, e.revenue_sharing_type, c.branch_group_name, a.branch_address, a.branch_entity, a.is_active')
                        ->join('tparkmanagement b', 'a.parkmanagement_id = b.parkmanagement_id', 'left')
                        ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                        ->join('tfee_header d', 'd.branch_id = a.branch_id', 'left')
                        ->join('tmaster_revenue e', 'e.id = d.revenue_id', 'left')
                        ->where($where_params)
                        ->orderBy('a.branch_id', 'ASC')
                        ->get()->getResult();
    }

    public function get_master_area(){
        $where_params = [];
        return $this->db->table('tbranch_group a')
                        ->get()->getResult();
    }

    public function get_master_revenue_type(){
        $where_params = [
            'is_active' => '1'
        ];
        return $this->db->table('tmaster_revenue a')
                        ->get()->getResult();
    }

    public function get_master_pengelola($search_term){
        return $this->db->table('tparkmanagement a')
                        ->select('a.parkmanagement_id AS id, a.parkmanagement_name AS value')
                        ->like('parkmanagement_name', $search_term, 'both')
                        ->get()->getResult();
    }

    public function get_duplicate_code($branch_code){
        $where_params = [
            'a.branch_code' => $branch_code
        ];
        return $this->db->table('tbranch a')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function save_form_resto($data, $user_nik){
        $branch_code = $branch_name = $branch_address = $is_active = $branch_group_id = $parkmanagement_id = $store_key = $branch_pos = $branch_entity = $create_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "kode_resto":
                    $branch_code = $value['value'];
                break;
                case "nama_resto":
                    $branch_name = $value['value'];
                break;
                case "area_resto":
                    $branch_group_id = $value['value'];
                break;
                case "alamat_resto":
                    $branch_address = $value['value'];
                break;
                case "keaktifan":
                    $is_active = intval($value['value']);
                break;
                case "store_key":
                    $store_key = $value['value'];
                break;
                case "branch_pos":
                    $branch_pos = $value['value'];
                break;
                case "branch_entity":
                    $branch_entity = $value['value'];
                break;
                case "pengelola_parkir_resto":
                    $parkmanagement_id = $value['value'];
                break;
            }
        }
        $create_by = $user_nik;
        $create_date = date('Y-m-d H:i:s');
        $insert_data = [
            'branch_code' => $branch_code,
            'branch_name' => $branch_name,
            'branch_address' => $branch_address,
            'is_active' => $is_active,
            'branch_group_id' => $branch_group_id,
            'parkmanagement_id' => $parkmanagement_id,
            'create_by' => $create_by,
            'create_date' => $create_date,
            'store_key' => $store_key,
            'branch_pos' => $branch_pos,
            'branch_entity' => $branch_entity
        ];
        $this->db->table('tbranch')
                    ->insert($insert_data);
                    
        return $this->db->affectedRows();
        // return $insert_data;
    }

    public function get_data_by_id($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        return $this->db->table('tbranch a')
                        ->select('a.branch_id, a.branch_code, a.branch_name, c.branch_group_id, a.branch_address, a.branch_entity, a.is_active, b.parkmanagement_id, b.parkmanagement_name, a.store_key, a.branch_pos')
                        ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function update_form_resto($data, $user_nik, $branch_id){
        $branch_code = $branch_name = $branch_address = $is_active = $branch_group_id = $parkmanagement_id = $store_key = $branch_pos = $branch_entity = $modified_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "kode_resto":
                    $branch_code = $value['value'];
                break;
                case "nama_resto":
                    $branch_name = $value['value'];
                break;
                case "area_resto":
                    $branch_group_id = $value['value'];
                break;
                case "alamat_resto":
                    $branch_address = $value['value'];
                break;
                case "keaktifan":
                    $is_active = intval($value['value']);
                break;
                case "store_key":
                    $store_key = $value['value'];
                break;
                case "branch_pos":
                    $branch_pos = $value['value'];
                break;
                case "branch_entity":
                    $branch_entity = $value['value'];
                break;
                case "pengelola_parkir_resto":
                    $parkmanagement_id = $value['value'];
                break;
            }
        }
        $modified_by = $user_nik;
        $modified_date = date('Y-m-d H:i:s');
        $update_data = [
            'branch_code' => $branch_code,
            'branch_name' => $branch_name,
            'branch_address' => $branch_address,
            'is_active' => $is_active,
            'branch_group_id' => $branch_group_id,
            'parkmanagement_id' => $parkmanagement_id,
            'modified_by' => $modified_by,
            'modified_date' => $modified_date,
            'store_key' => $store_key,
            'branch_pos' => $branch_pos,
            'branch_entity' => $branch_entity
        ];
        $this->db->table('tbranch a')
                    ->where('a.branch_id', $branch_id)
                    ->update($update_data);
                    
        return $this->db->affectedRows();
        // return $insert_data;
    }
}