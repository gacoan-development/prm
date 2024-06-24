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

    public function check_invoice_number($branch_id, $inv_date){
        $where_params = [
            'a.branch_id' => $branch_id,
            'DATE(a.inv_date)' => date('Y-m-d', strtotime($inv_date))
        ];
        return $this->db->table('tinvoice a')
                        // ->select('a.branch_code, a.branch_name, a.branch_address, b.branch_group_name')
                        // ->join('tbranch_group b', 'b.branch_group_id = a.branch_group_id', 'left')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function save_invoice_header($branch_id, $inv_date){
        // generate invice code
        $invoice_code = 'INV/';
        $where_params = [
            'a.branch_id' => $branch_id
        ];
        $four_letter_branch_code = $this->db->table('tbranch a')
                                            ->select('a.branch_code')
                                            ->where($where_params)
                                            ->get()->getResult();
        $four_letter_branch_code = explode('.', $four_letter_branch_code[0]->branch_code)[1];
        $invoice_code_date = date('Ymd', strtotime($inv_date));
        $invoice_code = $invoice_code.$four_letter_branch_code.'/'.$invoice_code_date;
        return $invoice_code;
        // return $four_letter_branch_code;
    }
}

?>