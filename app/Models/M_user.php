<?php 

namespace App\Models; 
use CodeIgniter\Model;

class M_user extends Model
{
    public function get_data($nik, $password){
        // $where_param = [
        //     'user_nik' => $nik,
        //     'password' => $password
        // ];
        $where_param = array(
            'user_nik' => $nik,
            'password' => $password
        );
        return $this->db->table('tusers')
                        ->join('tgroup_users', 'tgroup_users.group_user_id = tusers.group_id')
                        ->where($where_param)
                        ->get()->getRowArray();
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

    public function get_all(){
        $query = "SELECT
                    *
                    FROM	
                        (SELECT
                        a.user_id, a.user_name, a.user_nik, b.group_name, a.is_active,
                        GROUP_CONCAT(DISTINCT c.branch_group_name SEPARATOR ', ') AS wilayah, GROUP_CONCAT(d.branch_name SEPARATOR ' -- ') AS cabang
                        FROM miegacoa_prm.tusers a
                        LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                        LEFT JOIN miegacoa_prm.tbranch_group c ON c.branch_group_id = a.branch_reference_id
                        LEFT JOIN miegacoa_prm.tbranch d ON d.branch_group_id = c.branch_group_id
                        WHERE b.group_name = 'Regional Manager'
                        GROUP BY a.user_id
                        UNION
                        SELECT
                        a.user_id, a.user_name, a.user_nik, b.group_name, a.is_active,
                        GROUP_CONCAT(DISTINCT c.branch_group_name SEPARATOR ', ') AS wilayah, GROUP_CONCAT(d.branch_name SEPARATOR ' -- ') AS cabang
                        FROM miegacoa_prm.tusers a
                        LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                        LEFT JOIN miegacoa_prm.tbranch d ON d.branch_id = a.branch_reference_id
                        LEFT JOIN miegacoa_prm.tbranch_group c ON c.branch_group_id = d.branch_group_id
                        WHERE b.group_name = 'Store Manager'
                        GROUP BY a.user_id
                        UNION 
                        SELECT
                        a.user_id, a.user_name, a.user_nik, b.group_name, a.is_active,
                        '-' AS wilayah, '-' AS cabang
                        FROM miegacoa_prm.tusers a
                        LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                        WHERE b.group_name NOT IN('Regional Manager', 'Area Manager', 'Store Manager')
                        GROUP BY a.user_id) compiled_table
                    ORDER BY compiled_table.user_id ASC 
                    ";
        return $this->db->query($query)
                        ->getResult();
    }

    public function get_master_group_users(){
        $where_params = array(
            'a.is_active' => '1'
        );
        return $this->db->table('tgroup_users a')
                        ->where($where_params)
                        ->get()->getResult();
    }

    public function get_master_wilayah_users(){
        // $where_params = array(
        //     'a.is_active' => '1'
        // );
        return $this->db->table('tbranch_group a')
                        // ->where($where_params)
                        ->get()->getResult();
    }
}

?>