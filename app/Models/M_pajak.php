<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pajak extends Model
{
    protected $table            = 'ttaxpay';
    protected $primaryKey       = 'taxpay_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'create_date';
    protected $updatedField  = 'modified_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_all(){
        return $this->db->table('ttaxpay a')
                        ->get()->getResult();
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

    public function save_form_pajak($data, $user_nik){
        // generate code
        $result_last_id = $this->db->table('ttaxpay a')
                                    ->select('MAX(a.taxpay_id) AS latest_id')
                                    ->get()->getResult();
        $latest_id = intval($result_last_id[0]->latest_id)+1;
        $branch_id = $branch_name = $parkmanagement_id = $parkmanagement_name = $parkmanagement_num = $taxpay_pic = $taxpay_note = $taxpay_status = $taxpay_total = $taxpay_group_id = $bill_total_periodic = $taxpay_attachment = $create_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "nama_resto":
                    $branch_id = $value['value'];
                break;
                case "bill_total_taxpay":
                    $taxpay_total = $value['value'];
                break;
                case "ket_taxpay":
                    $taxpay_note = $value['value'];
                break;
                // case "keaktifan":
                //     $is_active = intval($value['value']);
                // break;
                // case "store_key":
                //     $store_key = $value['value'];
                // break;
                // case "taxpay_pos":
                //     $taxpay_pos = $value['value'];
                // break;
                // case "taxpay_entity":
                //     $taxpay_entity = $value['value'];
                // break;
                // case "pengelola_parkir_resto":
                //     $parkmanagement_id = $value['value'];
                // break;
            }
        }
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        $result_data_resto = $this->db->table('tbranch a')
                                        ->select('a.branch_name, b.parkmanagement_id, b.parkmanagement_name, b.parkmanagement_num')
                                        ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id')
                                        ->where($where_params)
                                        ->get()->getResult();
        $branch_name = $result_data_resto[0]->branch_name;
        $parkmanagement_id = $result_data_resto[0]->parkmanagement_id;
        $parkmanagement_name = $result_data_resto[0]->parkmanagement_name;
        $parkmanagement_num = $result_data_resto[0]->parkmanagement_num;
        $taxpay_status = 1; // dipaksa 1 dulu aja
        $create_by = $user_nik;
        $taxpay_date = date('Y-m-d H:i:s');
        $create_date = date('Y-m-d H:i:s');
        $insert_data = [
            'taxpay_code' => 'TAX'.$latest_id,
            'branch_id' => $branch_id,
            'branch_name' => $branch_name,
            'parkmanagement_id' => $parkmanagement_id,
            'parkmanagement_name' => $parkmanagement_name,
            'parkmanagement_num' => $parkmanagement_num,
            'taxpay_date' => $taxpay_date,
            'taxpay_pic' => $taxpay_pic,
            'taxpay_note' => $taxpay_note,
            'taxpay_status' => $taxpay_status,
            'taxpay_total' => $taxpay_total,
            'bill_total_periodic' => $bill_total_periodic,
            'taxpay_attachment' => $taxpay_attachment,
            'create_by' => $create_by,
            'create_date' => $create_date
        ];
        $this->db->table('ttaxpay')
                    ->insert($insert_data);
                    
        // return $this->db->affectedRows();
        // return $insert_data;
        return $this->db->insertID();
    }

    public function update_form_pajak($data, $user_nik, $taxpay_id){
        $taxpay_code = $branch_id = $branch_name = $parkmanagement_id = $parkmanagement_name = $parkmanagement_num = $taxpay_pic = $taxpay_note = $taxpay_status = $taxpay_total = $taxpay_group_id = $bill_total_periodic = $taxpay_attachment = $create_by = '';
        foreach($data AS $key => $value){
            switch($value['name']){
                case "kode_taxpay":
                    $taxpay_code = $value['value'];
                break;
                case "nama_resto":
                    $branch_id = $value['value'];
                break;
                case "bill_total_taxpay":
                    $taxpay_total = $value['value'];
                break;
                case "ket_taxpay":
                    $taxpay_note = $value['value'];
                break;
                // case "keaktifan":
                //     $is_active = intval($value['value']);
                // break;
                // case "store_key":
                //     $store_key = $value['value'];
                // break;
                // case "taxpay_pos":
                //     $taxpay_pos = $value['value'];
                // break;
                // case "taxpay_entity":
                //     $taxpay_entity = $value['value'];
                // break;
                // case "pengelola_parkir_resto":
                //     $parkmanagement_id = $value['value'];
                // break;
            }
        }
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        $result_data_resto = $this->db->table('tbranch a')
                                        ->select('a.branch_name, b.parkmanagement_id, b.parkmanagement_name, b.parkmanagement_num')
                                        ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id')
                                        ->where($where_params)
                                        ->get()->getResult();
        $branch_name = $result_data_resto[0]->branch_name;
        $parkmanagement_id = $result_data_resto[0]->parkmanagement_id;
        $parkmanagement_name = $result_data_resto[0]->parkmanagement_name;
        $parkmanagement_num = $result_data_resto[0]->parkmanagement_num;
        $taxpay_status = 1; // dipaksa 1 dulu aja
        $create_by = $user_nik;
        $taxpay_date = date('Y-m-d H:i:s');
        $create_date = date('Y-m-d H:i:s');
        $where_params = [
            'a.taxpay_id' => $taxpay_id
        ];
        $update_data = [
            'taxpay_code' => $taxpay_code,
            'branch_id' => $branch_id,
            'branch_name' => $branch_name,
            'parkmanagement_id' => $parkmanagement_id,
            'parkmanagement_name' => $parkmanagement_name,
            'parkmanagement_num' => $parkmanagement_num,
            'taxpay_date' => $taxpay_date,
            'taxpay_pic' => $taxpay_pic,
            'taxpay_note' => $taxpay_note,
            'taxpay_status' => $taxpay_status,
            'taxpay_total' => $taxpay_total,
            'bill_total_periodic' => $bill_total_periodic,
            'taxpay_attachment' => $taxpay_attachment,
            'create_by' => $create_by,
            'create_date' => $create_date
        ];
        $this->db->table('ttaxpay a')
                    ->where($where_params)
                    ->update($update_data);
                    
        // return $this->db->affectedRows();
        // return $insert_data;
        // return $this->db->insertID();
        return $taxpay_id;
    }

    public function update_attachment($taxpay_id, $filename){
        $where_params = [
            'a.taxpay_id' => $taxpay_id
        ];
        $update_data = [
            'a.taxpay_attachment' => $filename
        ];
        $this->db->table('ttaxpay a')
                    ->where($where_params)
                    ->update($update_data);
        return $this->db->affectedRows();
    }

    public function get_data_by_id($taxpay_id){
        $where_params = [
            'a.taxpay_id' => $taxpay_id
        ];
        return $this->db->table('ttaxpay a')
                        // ->select('a.taxpay_id, a.branch_code, a.branch_name, c.branch_group_id, a.branch_address, a.branch_entity, a.is_active, b.parkmanagement_id, b.parkmanagement_name, a.store_key, a.branch_pos')
                        // ->join('tparkmanagement b', 'b.parkmanagement_id = a.parkmanagement_id', 'left')
                        // ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function update_uploaded_pajak($taxpay_id_upload, $filename){
        $update_data = [
            'a.taxpay_attachment' => $filename
        ];
        $this->db->table('ttaxpay a')
                    ->where('a.taxpay_id', $taxpay_id_upload)
                    ->update($update_data);
        $affected_rows = $this->db->affectedRows();
        return $affected_rows;
    }
}
