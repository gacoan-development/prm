<?php
namespace App\Models;
use CodeIgniter\Model;

class M_pengelola extends Model
{
    public function get_all(){
        $where_params = array(
            // 'a.is_active' => '1'
        );
        return $this->db->table('tparkmanagement a')
                        ->select('a.parkmanagement_id, a.parkmanagement_code, a.parkmanagement_name, a.parkmanagement_num, a.parkmanagement_nik, a.is_active, a.additional_attachments')
                        ->select('GROUP_CONCAT(b.branch_name SEPARATOR "?") AS branch_name')
                        ->join('tbranch b', 'b.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->where($where_params)
                        ->groupBy('a.parkmanagement_id')
                        ->get()->getResult();
    }

    public function get_resto_not_managed($search_term){
        $where_params = [
            'a.parkmanagement_id' => null
        ];
        return $this->db->table('tbranch a')
                        ->select('a.branch_id AS id, a.branch_name AS value')
                        ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->like('a.branch_name', $search_term, 'both')
                        ->get()->getResult();
    }

    public function get_resto_not_managed_detail($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        return $this->db->table('tbranch a')
                        ->select('a.branch_code, a.branch_name, a.branch_address, b.branch_group_name, c.parkmanagement_name')
                        ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                        ->join('tparkmanagement c', 'c.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_data_by_id($vendor_id){
        $where_params = [
            'a.parkmanagement_id' => $vendor_id,
            // 'a.is_active' => '1'
        ];
        return $this->db->table('tparkmanagement a')
                        ->select('a.parkmanagement_id, a.parkmanagement_code, a.parkmanagement_name, a.parkmanagement_num, a.parkmanagement_nik, a.is_active, a.additional_attachments, a.parkmanagement_note')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_resto_managed($vendor_id){
        $where_params = [
            'a.parkmanagement_id' => $vendor_id,
            'a.is_active' => '1'
        ];
        return $this->db->table('tbranch a')
                        ->select('a.branch_id, a.branch_code, a.branch_name, a.branch_address, b.branch_group_name')
                        ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function save_form_pengelola($data, $user_nik){
        // generate vendor code
        $next_vendor_code = $this->db->table('tparkmanagement a')
                                        ->select('MAX(a.parkmanagement_id)+1 AS next_vendor_code')
                                        ->get()->getResult();
        $vendor_code = $next_vendor_code[0]->next_vendor_code;
        switch(strlen($vendor_code)){
            case 1:
                $vendor_code = 'PR000'.$vendor_code;
            break;
            case 2:
                $vendor_code = 'PR00'.$vendor_code;
            break;
            case 3:
                $vendor_code = 'PR0'.$vendor_code;
            break;
            default:
                $vendor_code = 'PR'.$vendor_code;
            break;
        }
        $parkmanagement_name = $parkmanagement_num = $alt_number = $parkmanagement_nik = $parkmanagement_note = $branch_managed = $is_active = $create_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_pengelola_parkir":
                    $parkmanagement_name = $value['value'];
                break;
                case "hp_pengelola_parkir":
                    $parkmanagement_num = $value['value'];
                break;
                case "ktp_pengelola_parkir":
                    $parkmanagement_nik = $value['value'];
                break;
                case "keterangan_pengelola_parkir":
                    $parkmanagement_note = $value['value'];
                break;
                case "resto_yang_dikelola":
                    $branch_managed = $value['value'];
                break;
                case "keaktifan_pengelola_parkir":
                    $is_active = intval($value['value']);
                break;
            }
        }
        $create_by = $user_nik;
        $create_date = date('Y-m-d H:i:s');
        $insert_header = [
            'parkmanagement_code' => $vendor_code,
            'parkmanagement_name' => $parkmanagement_name,
            'parkmanagement_num' => $parkmanagement_num,
            'parkmanagement_nik' => $parkmanagement_nik,
            'parkmanagement_note' => $parkmanagement_note,
            'alt_number' => $alt_number,
            'is_active' => $is_active,
            'create_by' => $create_by,
            'create_date' => $create_date
        ];
        $this->db->table('tparkmanagement')
                    ->insert($insert_header);
        $affected_header = $this->db->affectedRows();
        $last_insert_id = $this->db->insertID();
        if(count($branch_managed) > 0){ // jika detail headernya udah ketangkep dan emang ada detail headernya
            if(intval($affected_header) > 0){ // jika headernya udah berhasil ke-insert
                foreach($branch_managed AS $key_detail => $value_detail){
                    $where_params = [
                        'a.branch_id' => $value_detail['nama_resto']
                    ];
                    $update_data = [
                        'a.parkmanagement_id' => $last_insert_id
                    ];
                    $this->db->table('tbranch a')
                                ->where($where_params)
                                ->update($update_data);
                }
            }
            $affected_detail = $this->db->affectedRows();
            // return $affected_detail;
        }else{
            // return $affected_header;
        }
        return $last_insert_id;
    }

    public function update_form_pengelola($data, $user_nik, $vendor_id){
        $parkmanagement_name = $parkmanagement_num = $alt_number = $parkmanagement_nik = $parkmanagement_note = $branch_managed = $is_active = $modified_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_pengelola_parkir":
                    $parkmanagement_name = $value['value'];
                break;
                case "hp_pengelola_parkir":
                    $parkmanagement_num = $value['value'];
                break;
                case "ktp_pengelola_parkir":
                    $parkmanagement_nik = $value['value'];
                break;
                case "keterangan_pengelola_parkir":
                    $parkmanagement_note = $value['value'];
                break;
                case "resto_yang_dikelola":
                    $branch_managed = $value['value'];
                break;
                case "keaktifan_pengelola_parkir":
                    $is_active = intval($value['value']);
                break;
            }
        }
        $modified_by = $user_nik;
        $modified_date = date('Y-m-d H:i:s');
        $update_data = [
            'parkmanagement_name' => $parkmanagement_name,
            'parkmanagement_num' => $parkmanagement_num,
            'parkmanagement_nik' => $parkmanagement_nik,
            'parkmanagement_note' => $parkmanagement_note,
            'alt_number' => $alt_number,
            'is_active' => $is_active,
            'modified_by' => $modified_by,
            'modified_date' => $modified_date
        ];
        $this->db->table('tparkmanagement a')
                    ->where('a.parkmanagement_id', $vendor_id)
                    ->update($update_data);
        $affected_header = $this->db->affectedRows();
        if(count($branch_managed) > 0){ // jika detail headernya udah ketangkep dan emang ada detail headernya
            if(intval($affected_header) > 0){ // jika headernya udah berhasil ke-insert
                if($is_active == 1){
                    // ngosongin dulu yang udah ada
                    $where_params = [
                        'a.parkmanagement_id' => $vendor_id
                    ];
                    $update_data = [
                        'a.parkmanagement_id' => null
                    ];
                    $this->db->table('tbranch a')
                                ->where($where_params)
                                ->update($update_data);
                    // setelah itu baru diupdate semua branch supaya sesuai dengan vendor_id
                    foreach($branch_managed AS $key_detail => $value_detail){
                        $where_params = [
                            'a.branch_id' => $value_detail['nama_resto']
                        ];
                        $update_data = [
                            'a.parkmanagement_id' => $vendor_id
                        ];
                        $this->db->table('tbranch a')
                                    ->where($where_params)
                                    ->update($update_data);
                    }
                }else if($is_active == 0){ // kalo restonya di-non aktifkan, resto nya akan kebuka semua
                    // ngosongin dulu yang udah ada
                    $where_params = [
                        'a.parkmanagement_id' => $vendor_id
                    ];
                    $update_data = [
                        'a.parkmanagement_id' => null
                    ];
                    $this->db->table('tbranch a')
                                ->where($where_params)
                                ->update($update_data);
                    // setelah itu baru diupdate semua branch supaya sesuai dengan vendor_id
                    foreach($branch_managed AS $key_detail => $value_detail){
                        $where_params = [
                            'a.branch_id' => $value_detail['nama_resto']
                        ];
                        $update_data = [
                            'a.parkmanagement_id' => null
                        ];
                        $this->db->table('tbranch a')
                                    ->where($where_params)
                                    ->update($update_data);
                    }
                }
            }
            $affected_detail = $this->db->affectedRows();
            return $affected_detail;
        }else{
            return $affected_header;
        }
    }

    public function update_uploaded_pengelola($vendor_id_upload, $filename){
        $update_data = [
            'a.additional_attachments' => $filename
        ];
        $this->db->table('tparkmanagement a')
                    ->where('a.parkmanagement_id', $vendor_id_upload)
                    ->update($update_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }
}
?>