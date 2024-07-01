<?php
namespace App\Models;
use CodeIgniter\Model;

class M_report extends Model
{
    public function get_receive_fee_all($date_receive_fee){
        $date_receive_fee = date('Y-m-d', strtotime($date_receive_fee));
        $query = "select 
                    `tbl_main`.branch_name as 'nama_resto'
                    ,`tbl_main`.branch_code as 'kode_resto'
                    ,`tbl_main`.billed_nominal as 'tagihan_bill'
                    ,`tbl_main`.pay_off_nominal as 'setoran_harian_bill'
                    ,`tbl_main`.selisih as 'selisih'
                    ,SUM(`tbl_terhutang`.billed_nominal - `tbl_terhutang`.pay_off_nominal) as 'jumlah_terhutang'
                    ,concat(round(( `tbl_main`.pay_off_nominal / `tbl_main`.billed_nominal * 100)), '%') as 'persentase_setoran_harian'
                    ,`tbl_main`.inv_note as 'keterangan'

                    from

                    (Select 

                    br.branch_name 
                    ,br.branch_code 
                    ,inv.billed_nominal 
                    ,inv.inv_date
                    ,inv.pay_off_nominal 
                    ,(inv.billed_nominal - inv.pay_off_nominal) as 'selisih'
                    , inv.inv_note

                    from

                    miegacoa_prm.tbranch br
                    inner join miegacoa_prm.tinvoice inv
                    on br.branch_id = inv.branch_id
                    where inv.inv_date = '$date_receive_fee') as `tbl_main`

                    left join

                    (select br.branch_code, inv.inv_date, inv.billed_nominal, inv.pay_off_nominal from
                    miegacoa_prm.tinvoice inv 
                    inner join miegacoa_prm.tbranch br
                    on br.branch_id = inv.branch_id
                    where inv.inv_date <= '$date_receive_fee') as `tbl_terhutang`

                    on `tbl_terhutang`.branch_code = `tbl_main`.branch_code

                    GROUP BY 
                        `tbl_main`.branch_name,
                        `tbl_main`.branch_code,
                        `tbl_main`.billed_nominal,
                        `tbl_main`.pay_off_nominal,
                        `tbl_main`.selisih,
                        `tbl_main`.inv_note ;";
        return $this->db->query($query)->getResult();
    }

    
}

?>