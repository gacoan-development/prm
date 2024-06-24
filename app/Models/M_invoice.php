<?php
namespace App\Models;
use CodeIgniter\Model;

class M_invoice extends Model
{
    public function get_all($date_invoice){
        $where_params = [
            'DATE(a.inv_date)' => date('Y-m-d', strtotime($date_invoice))
        ];
        return $this->db->table('tinvoice a')
                        ->join('tbranch b', 'b.branch_id = a.branch_id', 'left')
                        ->join('tbranch_group c', 'c.branch_group_id = b.branch_group_id', 'left')
                        ->where($where_params)
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

    public function get_resto_detail($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        return $this->db->table('tbranch a')
                        ->select('a.branch_code, a.branch_name, a.branch_address, b.branch_group_name')
                        ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function check_fee_header($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        return $this->db->table('tfee_header a')
                        ->select('*, IF(NOW() BETWEEN a.fee_date_active AND a.fee_date_exp, "applied", "exp") AS fee_status')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function check_invoice_number($branch_id, $inv_date){
        $where_params = [
            'a.branch_id' => $branch_id,
            'DATE(a.inv_date)' => date('Y-m-d', strtotime($inv_date))
        ];
        return $this->db->table('tinvoice a')
                        // ->select('a.branch_code, a.branch_name, a.branch_address, b.branch_group_name')
                        ->join('tusers b', 'b.user_nik = a.create_by', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function save_invoice_header($branch_id, $inv_date, $user_nik, $inv_note){
        // generate invice code
        $invoice_code = 'INV/';
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        $select_result = $this->db->table('tbranch a')
                                            ->select('a.branch_code, a.store_key')
                                            ->where($where_params)
                                            ->get()->getResult();
        $four_letter_branch_code = explode('.', $select_result[0]->branch_code)[1];
        $invoice_code_date = date('Ymd', strtotime($inv_date));
        $invoice_code = $invoice_code.$four_letter_branch_code.'/'.$invoice_code_date;
        $store_key = $select_result[0]->store_key;

        $inv_note = $inv_status = $inv_attachment = '';
        $billed_nominal = $pay_off_nominal = 0;
        $inv_status = 0;
        $create_date = date('Y-m-d');

        $insert_data = [
            'inv_code' => $invoice_code,
            'branch_id' => $branch_id,
            'billed_nominal' => $billed_nominal,
            'pay_off_nominal' => $pay_off_nominal,
            'inv_date' => $inv_date,
            'inv_date' => date('Y-m-d', strtotime($inv_date)),
            'inv_note' => $inv_note,
            'inv_status' => $inv_status,
            'inv_attachment' => $inv_attachment,
            'store_key' => $store_key,
            'create_by' => $user_nik,
            'create_date' => $create_date
        ];
        $this->db->table('tinvoice')
                    ->insert($insert_data);
                    
        return [
            'affected_rows' => $this->db->affectedRows(),
            'inv_code' => $invoice_code
        ];
    }

    public function load_existing_invoice($branch_id, $inv_date){
        $where_params = [
            'a.branch_id' => $branch_id,
            'DATE(a.inv_date)' => date('Y-m-d', strtotime($inv_date))
        ];
        $result = $this->db->table('tinvoice a')
                            ->select('*, a.inv_id AS invoice_id')
                            ->join('tinvoice_detail b', 'b.inv_id = a.inv_id', 'left')
                            ->join('tbranch c', 'c.branch_id = a.branch_id', 'left')
                            ->join('tparkmanagement d', 'd.parkmanagement_id = c.parkmanagement_id', 'left')
                            ->where($where_params)
                            ->get()->getResult();
        foreach($result AS $value){
            $value->inv_date = date('d/m/Y', strtotime($value->inv_date));
        }
        return $result;
    }

    public function get_format_tarif($branch_id){
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        return $this->db->table('tfee_header a')
                        ->join('tfee_detail b', 'b.fee_id = a.fee_id', 'left')
                        ->join('tmaster_revenue c', 'c.id = a.revenue_id', 'left')
                        ->join('torder d', 'd.order_id = b.order_id', 'left')
                        ->select('*, IF(NOW() BETWEEN a.fee_date_active AND a.fee_date_exp, "applied", "exp") AS fee_status')
                        ->where($where_params)
                        ->get()->getResult();
    }
    
    public function outstanding_invoice_list($branch_id, $inv_date){
        $inv_date = date('Y-m-d', strtotime($inv_date));
        $where_params = [
            'a.branch_id' => $branch_id,
            'a.inv_date !=' => $inv_date,
            'a.inv_status' => 0 // nyari yang inv_status nya 0 artinya masih outstanding
        ];
        $result = $this->db->table('tinvoice a')
                            ->join('(SELECT
                                        *
                                        FROM 
                                            (SELECT
                                            a.*
                                            FROM tinstallment_payment a
                                            JOIN tinvoice b ON b.inv_id = a.inv_id
                                            WHERE b.branch_id = "'.$branch_id.'"
                                            AND b.inv_date = "'.$inv_date.'"
                                            ORDER BY a.installment_order DESC
                                            LIMIT 1) a
                                        GROUP BY a.inv_id) b', 'b.inv_id = a.inv_id', 'left')
                            ->where($where_params)
                            ->orderBy('b.installment_order', 'desc')
                            ->get()->getResult();
        foreach($result AS $value){
            $value->inv_date = date('d/m/Y', strtotime($value->inv_date));
        }
        return $result;
    }

    public function update_invoice_header($branch_id, $inv_date, $user_nik, $inv_note, $billed_nominal, $pay_off_nominal){
        $inv_date = date('Y-m-d' ,strtotime($inv_date));
        $where_params = [
            'a.branch_id' => $branch_id,
            'a.inv_date' => $inv_date
        ];
        $update_data = [
            'a.billed_nominal' => $billed_nominal,
            'a.pay_off_nominal' => $pay_off_nominal,
            'a.inv_note' => $inv_note,
            'a.modified_by' => $user_nik,
            'a.modified_date' => date('Y-m-d H:i:s')
        ];
        $this->db->table('tinvoice a')
                    ->where($where_params)
                    ->update($update_data);
        return $this->db->affectedRows();
    }

    public function selected_outstanding($checked_id){
        $checkedId = explode(',', $checked_id);
        $result = $this->db->table('tinvoice a')
                            ->join('tinvoice_detail b', 'b.inv_id = a.inv_id', 'left')
                            ->join('tbranch c', 'c.branch_id = a.branch_id', 'left')
                            ->join('tparkmanagement d', 'd.parkmanagement_id = c.parkmanagement_id', 'left')
                            ->whereIn('a.inv_id', $checkedId)
                            ->get()->getResult();
        foreach($result AS $value){
            $value->inv_date = date('d/m/Y', strtotime($value->inv_date));
        }
        return $result;
    }

    public function update_uploaded_invoice($inv_id_upload, $filename, $setoran_invoice, $selisih_invoice){
        $update_data = [
            'a.inv_attachment' => $filename
        ];
        $this->db->table('tinvoice a')
                    ->where('a.inv_id', $inv_id_upload)
                    ->update($update_data);
        $affected_rows = $this->db->affectedRows();
        if($affected_rows > 0){
            // update pay_off_nominal
            $result_current_pay_off = $this->db->table('tinvoice a')
                                                        ->select('a.pay_off_nominal')
                                                        ->where('a.inv_id', $inv_id_upload)
                                                        ->get()->getResult();
            $current_pay_off = $result_current_pay_off[0]->pay_off_nominal;
            $updated_pay_off = $current_pay_off + $setoran_invoice;
            $update_data = [
                'a.pay_off_nominal' => $updated_pay_off
            ];
            $this->db->table('tinvoice a')
                        ->where('a.inv_id', $inv_id_upload)
                        ->update($update_data);
            // inserting rows to installment payment
            $result_last_installment_order = $this->db->table('tinstallment_payment a')
                                                        ->select('IF(MAX(a.installment_order) IS NULL, 0, MAX(a.installment_order)) AS last_installment_order')
                                                        ->where('a.inv_id', $inv_id_upload)
                                                        ->get()->getResult();
            $last_installment_order = $result_last_installment_order[0]->last_installment_order;

            $insert_data = [
                'inv_id' => $inv_id_upload,
                'installment_order' => intval($last_installment_order)+1,
                'installment_paid_amount' => $setoran_invoice,
                'amount_outstanding' => $selisih_invoice,
                'ref_inv_id' => $inv_id_upload,
                'date_pay_off' => date('Y-m-d H:i:s')
            ];
            $this->db->table('tinstallment_payment')
                        ->insert($insert_data);
            $affected_installment_payment = $this->db->affectedRows();
            return $affected_installment_payment;
        }
    }
}

?>