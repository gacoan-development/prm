<?php
namespace App\Models;
use CodeIgniter\Model;

class M_parkir extends Model
{
    public function get_all(){
        $where_params = array(
            // 'a.is_active' => '1'
        );
        return $this->db->table('tbranch a')
                        ->select('a.branch_id, a.branch_code, a.branch_name, c.branch_group_name, d.fee_date_active, d.fee_date_exp, e.revenue_sharing_type, b.parkmanagement_name, d.fee_id')
                        ->select('IF(NOW() BETWEEN d.fee_date_active AND d.fee_date_exp, "active", IF(d.fee_date_active IS NULL OR d.fee_date_exp IS NULL, "not_declared", "expired")) AS active_status')
                        ->join('tparkmanagement b', 'a.parkmanagement_id = b.parkmanagement_id')
                        ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                        ->join('(SELECT
                                    *
                                    from
                                        (SELECT
                                        *,
                                        RANK() OVER(PARTITION BY a.branch_id ORDER BY a.fee_date_exp DESC) AS latest_fee_rank
                                        FROM tfee_header a) b
                                    WHERE latest_fee_rank = 1) d', 'd.branch_id = a.branch_id', 'left')
                        ->join('tmaster_revenue e', 'e.id = d.revenue_id', 'left')
                        ->where($where_params)
                        ->orderBy('a.branch_id', 'ASC')
                        ->get()->getResult();
    }

    public function get_data_by_id($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        return $this->db->table('tbranch a')
                        ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_fee($fee_id){
        $where_params = [
            'a.fee_id' => $fee_id
        ];
        return $this->db->table('tfee_header a')
                        ->select('a.fee_id, a.fee_code, a.fee_name, DATE(a.fee_date_active) AS fee_date_active, DATE(a.fee_date_exp) AS fee_date_exp, 
                                    a.is_active, a.fee_note, a.revenue_id, a.flat_nbill_nominal, b.*,
                                    IF(b.fee_det_id IS NULL, "no_detail", "detailed") AS detail_status')
                        ->join('tfee_detail b', 'b.fee_id = a.fee_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_master_order(){
        $where_params = array(
            'a.is_active' => '1'
        );
        return $this->db->table('torder a')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_master_revenue_type(){
        $where_params = array(
            'a.is_active' => '1'
        );
        return $this->db->table('tmaster_revenue a')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_fee_history($branch_id){
        $where_params = array(
            'a.branch_id' => $branch_id
        );
        return $this->db->table('tfee_header a')
                        ->join('tmaster_revenue b', 'b.id = a.revenue_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }
    
    public function simpan_form_tarif_parkir($data, $user_nik, $branch_id){
        // generate fee code
        $next_fee_code = $this->db->table('tfee_header a')
                                    ->select('MAX(a.fee_id)+1 AS next_fee_code')
                                    ->get()->getResult();
        $fee_code = $next_fee_code[0]->next_fee_code;
        switch(strlen($fee_code)){
            case 1:
                $fee_code = 'FEE00'.$fee_code;
            break;
            case 2:
                $fee_code = 'FEE0'.$fee_code;
            break;
            default:
                $fee_code = 'FEE'.$fee_code;
            break;
        }
        $fee_name = $fee_date_active = $fee_date_exp = $is_active = $fee_note = $revenue_id = $flat_nbill_nominal = $detail_tarif_parkir = $create_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_tarif_parkir":
                    $fee_name = $value['value'];
                break;
                case "tanggal_aktif_tarif_parkir":
                    $fee_date_active = date('Y-m-d', strtotime($value['value']));
                break;
                case "tanggal_kadaluwarsa_tarif_parkir":
                    $fee_date_exp = date('Y-m-d', strtotime($value['value']));
                break;
                case "keterangan_tarif_parkir":
                    $fee_note = $value['value'];
                break;
                case "tipe_komisi":
                    $revenue_id = $value['value'];
                break;
                case "nominal_flat":
                    $flat_nbill_nominal = $value['value'];
                break;
                case "detail_tarif_parkir":
                    $detail_tarif_parkir = $value['value'];
                break;
            }
        }
        $is_active = '1';
        $create_by = $user_nik;
        $create_date = date('Y-m-d H:i:s');
        $insert_header = [
            'fee_code' => $fee_code,
            'fee_name' => $fee_name,
            'branch_id' => $branch_id,
            'fee_date_active' => $fee_date_active,
            'fee_date_exp' => $fee_date_exp,
            'is_active' => $is_active,
            'fee_note' => $fee_note,
            'revenue_id' => $revenue_id,
            'flat_nbill_nominal' => $flat_nbill_nominal,
            'create_by' => $create_by,
            'create_date' => $create_date
        ];
        $this->db->table('tfee_header')
                    ->insert($insert_header);
        $affected_header = $this->db->affectedRows();
        $last_insert_id = $this->db->insertID();
        if(is_array($detail_tarif_parkir)){ // jika detail headernya udah ketangkep dan emang ada detail headernya
            if(intval($affected_header) > 0){ // jika headernya udah berhasil ke-insert
                foreach($detail_tarif_parkir AS $key_detail => $value_detail){
                    $insert_detail = [
                        'fee_id' => $last_insert_id,
                        'branch_id' => $branch_id,
                        'order_id' => $value_detail['kode_order'],
                        'order_type_fee' => $value_detail['tipe_tarif'],
                        'fee_nominal' => $value_detail['nominal_tarif'],
                        'create_by' => $create_by,
                        'create_date' => $create_date
                    ];
                    $this->db->table('tfee_detail')
                                ->insert($insert_detail);
                }
                
            }
            $affected_detail = $this->db->affectedRows();
            return $affected_detail;
        }else{
            return $affected_header;
        }
    }

    public function update_form_tarif_parkir($fee_id, $data, $user_nik, $branch_id){
        $fee_name = $fee_date_active = $fee_date_exp = $is_active = $fee_note = $revenue_id = $flat_nbill_nominal = $detail_tarif_parkir = $modified_by = $modified_date = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_tarif_parkir":
                    $fee_name = $value['value'];
                break;
                case "tanggal_aktif_tarif_parkir":
                    $fee_date_active = date('Y-m-d', strtotime($value['value']));
                break;
                case "tanggal_kadaluwarsa_tarif_parkir":
                    $fee_date_exp = date('Y-m-d', strtotime($value['value']));
                break;
                case "keterangan_tarif_parkir":
                    $fee_note = $value['value'];
                break;
                case "tipe_komisi":
                    $revenue_id = $value['value'];
                break;
                case "nominal_flat":
                    $flat_nbill_nominal = $value['value'];
                break;
                case "detail_tarif_parkir":
                    $detail_tarif_parkir = $value['value'];
                break;
            }
        }
        $is_active = '1';
        $modified_by = $user_nik;
        $modified_date = date('Y-m-d H:i:s');
        $update_data = [
            'fee_name' => $fee_name,
            'fee_date_active' => $fee_date_active,
            'fee_date_exp' => $fee_date_exp,
            'is_active' => $is_active,
            'fee_note' => $fee_note,
            'revenue_id' => $revenue_id,
            'flat_nbill_nominal' => $flat_nbill_nominal,
            'modified_by' => $modified_by,
            'modified_date' => $modified_date
        ];
        $this->db->table('tfee_header a')
                    ->where('a.fee_id', $fee_id)
                    ->update($update_data);
        $affected_header = $this->db->affectedRows();
        if(is_array($detail_tarif_parkir)){ // jika detail headernya udah ketangkep dan emang ada detail headernya
            if(intval($affected_header) > 0){ // jika headernya udah berhasil ke-insert
                $this->db->table('tfee_detail')
                            ->where('fee_id', $fee_id)
                            ->delete();
                foreach($detail_tarif_parkir AS $key_detail => $value_detail){
                    $insert_detail = [
                        'fee_id' => $fee_id,
                        'branch_id' => $branch_id,
                        'order_id' => $value_detail['kode_order'],
                        'order_type_fee' => $value_detail['tipe_tarif'],
                        'fee_nominal' => $value_detail['nominal_tarif'],
                        'modified_by' => $modified_by,
                        'modified_date' => $modified_date
                    ];
                    $this->db->table('tfee_detail')
                                ->insert($insert_detail);
                }
            }
            $affected_detail = $this->db->affectedRows();
            return $affected_detail;
        }else{
            return $affected_header;
        }
    }
}
?>