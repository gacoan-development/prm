<?php
namespace App\Models;
use CodeIgniter\Model;

class M_parkir extends Model
{
    public function get_all($filter){
        if($filter != null){
            $where_params = [];
            if(in_array('applied', $filter)){
                array_push($where_params, 'DATEDIFF(d.fee_date_exp, NOW()) > 7');
            }
            if(in_array('almost_expired', $filter)){
                array_push($where_params, '(DATEDIFF(d.fee_date_exp, NOW()) <= 7 AND DATEDIFF(d.fee_date_exp, NOW()) > 0)');
            }
            if(in_array('expired', $filter)){
                array_push($where_params, 'NOW() > d.fee_date_exp');
            }
            if(in_array('not_declared', $filter)){
                array_push($where_params, '(d.fee_date_active IS NULL OR d.fee_date_exp IS NULL)');
            }
            $where_params = implode(" OR ", $where_params);
            return $this->db->table('tbranch a')
                            ->select('a.branch_id, a.branch_code, a.branch_name, c.branch_group_name, DATE_FORMAT(d.fee_date_active, "%d/%m/%Y") AS fee_date_active, DATE_FORMAT(d.fee_date_exp, "%d/%m/%Y") AS fee_date_exp, e.revenue_sharing_type, b.parkmanagement_name, d.fee_id')
                            ->select('CASE 
                                            WHEN DATEDIFF(d.fee_date_exp, NOW()) > 7 THEN "1_active"
                                            WHEN d.fee_date_active IS NULL OR d.fee_date_exp IS NULL THEN "2_notdeclared"
                                            WHEN DATEDIFF(d.fee_date_exp, NOW()) <= 7 AND DATEDIFF(d.fee_date_exp, NOW()) > 0 THEN "3_warning"
                                            WHEN NOW() > d.fee_date_exp THEN "4_expired"
                                            ELSE "5_notdetected"
                                        END AS active_status')
                            ->join('tparkmanagement b', 'a.parkmanagement_id = b.parkmanagement_id')
                            ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                            ->join('(SELECT
                                        *
                                        from
                                            (SELECT
                                            *,
                                            RANK() OVER(PARTITION BY a.branch_id ORDER BY a.fee_date_exp DESC) AS latest_fee_rank
                                            FROM tfee_header a) b
                                        WHERE latest_fee_rank = 1
                                        AND b.is_active != 0) d', 'd.branch_id = a.branch_id', 'left')
                            ->join('tmaster_revenue e', 'e.id = d.revenue_id', 'left')
                            ->where($where_params)
                            ->orderBy('active_status', 'DESC')
                            ->get()->getResult();
        }else{
            $result = new \stdClass();
            return $result;
        }
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
                        ->select('a.fee_id, a.fee_code, a.fee_name, DATE(a.fee_date_active) AS fee_date_active, DATE(a.fee_date_exp) AS fee_date_exp, a.attachment,
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
            // return $affected_detail;
        }else{
            // return $affected_header;
        }
        return $last_insert_id;
    }

    public function update_form_tarif_parkir($fee_id, $data, $user_nik, $branch_id){
        $fee_name = $fee_date_active = $fee_date_exp = $is_active = $fee_note = $revenue_id = $flat_nbill_nominal = $detail_tarif_parkir = $modified_by = $modified_date = $is_active = '';
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
                case "keaktifan_tarif_parkir":
                    $is_active = $value['value'];
                break;
            }
        }
        // $is_active = '1';
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
            if(intval($affected_header) > 0){ // jika headernya udah berhasil ke-update
                // harus manualin update flat_nbill_amount
                $update_flat_nbill = [
                    'flat_nbill_nominal' => 0
                ];
                $this->db->table('tfee_header')
                            ->where('fee_id', $fee_id)
                            ->update($update_flat_nbill);
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
            $this->db->table('tfee_detail')
                            ->where('fee_id', $fee_id)
                            ->delete();
            return $affected_header;
        }
    }

    public function check_fee_active($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id,
            // 'd.is_active' => '1'
        ];
        // $orWhere_params = [
        //     'd.is_active' => 'IS NOT NULL'
        // ];
        return $this->db->table('tbranch a')
                        ->select('a.branch_id, a.branch_code, a.branch_address, b.branch_group_name, c.parkmanagement_name, d.fee_id, d.fee_date_active, d.fee_date_exp')
                        ->select('IF(NOW() BETWEEN d.fee_date_active AND d.fee_date_exp, "active", "expired") AS active_status')
                        ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                        ->join('tparkmanagement c', 'c.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->join('tfee_header d', 'd.branch_id = a.branch_id AND d.is_active = 1', 'left')
                        ->where($where_params)
                        // ->orWhere($orWhere_params)
                        ->orderBy('d.fee_id', 'DESC')
                        ->limit(1)
                        ->get()->getResult();
    }

    public function update_uploaded_tarif($fee_id_upload, $filename){
        $update_data = [
            'a.attachment' => $filename
        ];
        $this->db->table('tfee_header a')
                    ->where('a.fee_id', $fee_id_upload)
                    ->update($update_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }

    public function get_all_resto($search_term){
        $where_params = [
            'a.is_active' => '1'
        ];
        return $this->db->table('tbranch a')
                            ->select('a.branch_id AS id, a.branch_name AS value')
                            ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                            ->where($where_params)
                            ->like('a.branch_name', $search_term, 'both')
                            ->get()->getResult();
    }
}
?>