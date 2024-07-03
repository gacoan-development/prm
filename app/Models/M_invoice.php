<?php
namespace App\Models;
use CodeIgniter\Model;

class M_invoice extends Model
{
    public function get_all($date_invoice){
        $where_params = [
            'DATE(a.inv_date)' => date('Y-m-d', strtotime($date_invoice))
        ];
        $result = $this->db->table('tinvoice a')
                        ->join('tbranch b', 'b.branch_id = a.branch_id', 'left')
                        ->join('tbranch_group c', 'c.branch_group_id = b.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
        foreach($result AS $value){
            $value->inv_date = date('d/m/Y', strtotime($value->inv_date));
        }
        return $result;
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
        // return $this->db->table('tfee_header a')
        //                 // ->select('*, IF(NOW() BETWEEN a.fee_date_active AND a.fee_date_exp, "applied", "exp") AS fee_status')
        //                 ->where($where_params)
        //                 ->where('NOW() BETWEEN a.fee_date_active AND a.fee_date_exp')
        //                 ->orderBy('a.fee_id', 'DESC')
        //                 ->get()->getResult();
        return $this->db->table('tbranch a')
                        ->select('a.branch_code, a.branch_address, c.branch_group_name, d.parkmanagement_name, b.fee_date_active, b.fee_date_exp')
                        ->select('IF(NOW() BETWEEN b.fee_date_active AND b.fee_date_exp, "applied", "not_applied") AS fee_status')
                        ->join('tfee_header b', 'b.branch_id = a.branch_id', 'left')
                        ->join('tbranch_group c', 'c.branch_group_id = a.branch_group_id', 'left')
                        ->join('tparkmanagement d', 'd.parkmanagement_id = a.parkmanagement_id', 'left')
                        ->where($where_params)
                        ->orderBy('b.fee_date_exp', 'DESC')
                        ->limit(1)
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

    public function load_detailed_invoice($branch_id, $inv_date){
        $where_params = [
            'a.branch_id' => $branch_id,
            'DATE(a.inv_date)' => date('Y-m-d', strtotime($inv_date))
        ];
        $result = $this->db->table('tinvoice a')
                            ->select('*, a.inv_id AS invoice_id')
                            ->join('tinvoice_detail b', 'b.inv_id = a.inv_id', 'left')
                            ->join('tbranch c', 'c.branch_id = a.branch_id', 'left')
                            ->join('tparkmanagement d', 'd.parkmanagement_id = c.parkmanagement_id', 'left')
                            ->join('torder e', 'e.order_id = b.order_id', 'left')
                            ->join('tfee_detail f', 'f.fee_id = b.fee_id AND f.order_id = b.order_id', 'left')
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
                        ->orderBy('a.fee_id', 'DESC')
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
                            ->select('a.inv_id, a.inv_date, a.inv_code, a.branch_id, a.billed_nominal, a.pay_off_nominal, a.inv_status, b.latest_order, c.installment_order, c.installment_paid_amount, c.amount_outstanding, c.ref_inv_id')
                            ->join('(SELECT
                                        a.inv_id, MAX(a.installment_order) AS latest_order
                                        FROM tinstallment_payment a
                                        GROUP BY a.inv_id) b', 'b.inv_id = a.inv_id', 'left')
                            ->join('tinstallment_payment c', 'c.inv_id = a.inv_id AND c.installment_order = b.latest_order', 'left')
                            ->where($where_params)
                            ->orderBy('a.inv_date', 'asc')
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

    public function update_invoice_detail($branch_id, $inv_date, $user_nik, $compInvoiceDetail){
        $inv_date = date('Y-m-d' ,strtotime($inv_date));
        $where_params = [
            'a.branch_id' => $branch_id,
            'a.inv_date' => $inv_date
        ];
        $result_inv_id = $this->db->table('tinvoice a')
                                    ->select('a.inv_id')
                                    ->where($where_params)
                                    ->get()->getResult();
        $inv_id = $result_inv_id[0]->inv_id;

        $where_params = [
            'a.inv_id' => $inv_id
        ];
        $result_detail = $this->db->table('tinvoice_detail a')
                                    // ->select('a.inv_id')
                                    ->where($where_params)
                                    ->get()->getResult();
        if(count($result_detail) > 0){
            // update
            foreach($compInvoiceDetail AS $key => $row_detail){
                $order_id = $row_detail['order_id'];
                $where_params = [
                    'a.inv_id' => $inv_id,
                    'a.order_id' => $order_id
                ];
                $fee_id = $row_detail['fee_id'];
                $amount_of_bill = $row_detail['amount_of_bill'];
                $bill_parking_fee = $row_detail['bill_parking_fee'];
                $amount_of_income = $row_detail['amount_of_income'];
                $update_data = [
                    // 'a.order_id' => $order_id,
                    'a.fee_id' => $fee_id,
                    'a.amount_of_bill' => $amount_of_bill,
                    'a.bill_parking_fee' => $bill_parking_fee,
                    'a.amount_of_income' => $amount_of_income,
                    'a.modified_by' => $user_nik,
                    'a.modified_date' => date('Y-m-d H:i:s')
                ];
                $this->db->table('tinvoice_detail a')
                                ->where($where_params)
                                ->update($update_data); 
            }
        }else{
            // insert
            foreach($compInvoiceDetail AS $key => $row_detail){
                $order_id = $row_detail['order_id'];
                $fee_id = $row_detail['fee_id'];
                $amount_of_bill = $row_detail['amount_of_bill'];
                $bill_parking_fee = $row_detail['bill_parking_fee'];
                $amount_of_income = $row_detail['amount_of_income'];
                $insert_data = [
                    'inv_id' => $inv_id,
                    'order_id' => $order_id,
                    'branch_id' => $branch_id,
                    'fee_id' => $fee_id,
                    'amount_of_bill' => $amount_of_bill,
                    'bill_parking_fee' => $bill_parking_fee,
                    'amount_of_income' => $amount_of_income,
                    'create_by' => $user_nik,
                    'create_date' => date('Y-m-d H:i:s')
                ];
                $this->db->table('tinvoice_detail')
                            ->insert($insert_data); 
            }
        }
        return $this->db->affectedRows();
    }

    public function selected_outstanding($checked_id){
        $checkedId = explode(',', $checked_id);
        $result = $this->db->table('tinvoice a')
                            ->join('tinvoice_detail b', 'b.inv_id = a.inv_id', 'left')
                            ->join('tbranch c', 'c.branch_id = a.branch_id', 'left')
                            ->join('tparkmanagement d', 'd.parkmanagement_id = c.parkmanagement_id', 'left')
                            ->whereIn('a.inv_id', $checkedId)
                            ->groupBy('a.inv_id')
                            ->orderBy('a.inv_date', 'ASC')
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
            if($selisih_invoice == 0){
                $update_data['a.inv_status'] = 1;
            }
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

    public function update_selected_outstanding_invoice($outstanding_comp, $inv_id_upload){
        foreach($outstanding_comp AS $key => $outstanding_row){
            $outstanding_id = $outstanding_row['id'];
            $outstanding_deposit = $outstanding_row['outstanding_deposit'];
            $outstanding_nominal = $outstanding_row['outstanding_nominal'];
            $result_current_pay_off = $this->db->table('tinvoice a')
                                                        ->select('a.pay_off_nominal')
                                                        ->where('a.inv_id', $outstanding_id)
                                                        ->get()->getResult();
            $current_pay_off = $result_current_pay_off[0]->pay_off_nominal;
            $updated_pay_off = $current_pay_off + $outstanding_deposit;
            $update_data = [
                'a.pay_off_nominal' => $updated_pay_off
            ];
            if($outstanding_nominal == 0){
                $update_data['a.inv_status'] = 1;
            }
            $this->db->table('tinvoice a')
                        ->where('a.inv_id', $outstanding_id)
                        ->update($update_data);
            // inserting rows to installment payment
            $result_last_installment_order = $this->db->table('tinstallment_payment a')
                                                        ->select('IF(MAX(a.installment_order) IS NULL, 0, MAX(a.installment_order)) AS last_installment_order')
                                                        ->where('a.inv_id', $outstanding_id)
                                                        ->get()->getResult();
            $last_installment_order = $result_last_installment_order[0]->last_installment_order;

            $insert_data = [
                'inv_id' => $outstanding_id,
                'installment_order' => intval($last_installment_order)+1,
                'installment_paid_amount' => $outstanding_deposit,
                'amount_outstanding' => $outstanding_nominal,
                'ref_inv_id' => $inv_id_upload,
                'date_pay_off' => date('Y-m-d H:i:s')
            ];
            $this->db->table('tinstallment_payment')
                        ->insert($insert_data);
            $affected_installment_payment = $this->db->affectedRows();
        }
        return $affected_installment_payment;
    }
    public function get_all_outstanding($branch_id, $inv_date){
        $inv_date = date('Y-m-d', strtotime($inv_date));
        $where_params = [
            'a.branch_id' => $branch_id,
            'a.inv_date !=' => $inv_date,
            'a.inv_status' => 0 // nyari yang inv_status nya 0 artinya masih outstanding
        ];
        $result = $this->db->table('tinvoice a')
                            ->select('a.inv_id, a.inv_date, a.inv_code, a.branch_id, a.billed_nominal, a.pay_off_nominal, a.inv_status, b.latest_order, c.installment_order, c.installment_paid_amount, c.amount_outstanding, c.ref_inv_id')
                            ->join('(SELECT
                                        a.inv_id, MAX(a.installment_order) AS latest_order
                                        FROM tinstallment_payment a
                                        GROUP BY a.inv_id) b', 'b.inv_id = a.inv_id', 'left')
                            ->join('tinstallment_payment c', 'c.inv_id = a.inv_id AND c.installment_order = b.latest_order', 'left')
                            ->where($where_params)
                            ->orderBy('a.inv_date', 'asc')
                            ->get()->getResult();
        foreach($result AS $value){
            $value->inv_date = date('d/m/Y', strtotime($value->inv_date));
        }
        return $result;
    }

    public function get_data_by_id($inv_id){
        $where_params = [
            'a.inv_id' => $inv_id
        ];
        $result =  $this->db->table('tinvoice a')
                            ->select('a.branch_id, b.branch_name, a.inv_date')
                            ->join('tbranch b', 'b.branch_id = a.branch_id', 'left')
                            ->where($where_params)
                            ->get()->getResult();
        foreach($result AS $value){
            $value->inv_date = date('d-m-Y', strtotime($value->inv_date));
        }
        return $result;
    }
}

?>