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

    public function get_all(){
        $query = "SELECT
                    *
                    FROM 
                    (-- REGIONAL MANAGER
                    SELECT
                    a.user_id, a.user_name, a.user_nik, b.group_name, GROUP_CONCAT(DISTINCT d.branch_group_name) AS region_managed, GROUP_CONCAT(e.branch_name SEPARATOR ' -- ') AS branch_managed, a.is_active
                    FROM miegacoa_prm.tusers a
                    LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                    LEFT JOIN miegacoa_prm.tmanagerial_area c ON c.user_id = a.user_id
                    LEFT JOIN miegacoa_prm.tbranch_group d ON d.branch_group_id = c.branch
                    LEFT JOIN miegacoa_prm.tbranch e ON e.branch_group_id = d.branch_group_id
                    WHERE b.group_name = 'Regional Manager'
                    GROUP BY a.user_id
                    UNION 
                    -- AREA MANAGER
                    SELECT
                    a.user_id, a.user_name, a.user_nik, b.group_name, GROUP_CONCAT(DISTINCT d.branch_group_name) AS region_managed, GROUP_CONCAT(e.branch_name SEPARATOR ' -- ') AS branch_managed, a.is_active
                    FROM miegacoa_prm.tusers a
                    LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                    LEFT JOIN miegacoa_prm.tmanagerial_area c ON c.user_id = a.user_id
                    LEFT JOIN miegacoa_prm.tbranch e ON e.branch_id = c.branch
                    LEFT JOIN miegacoa_prm.tbranch_group d ON d.branch_group_id = e.branch_group_id
                    WHERE b.group_name = 'Area Manager'
                    GROUP BY a.user_id
                    UNION 
                    -- STORE MANAGER
                    SELECT
                    a.user_id, a.user_name, a.user_nik, b.group_name, GROUP_CONCAT(DISTINCT d.branch_group_name) AS region_managed, GROUP_CONCAT(e.branch_name SEPARATOR ' -- ') AS branch_managed, a.is_active
                    FROM miegacoa_prm.tusers a
                    LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                    LEFT JOIN miegacoa_prm.tmanagerial_area c ON c.user_id = a.user_id
                    LEFT JOIN miegacoa_prm.tbranch e ON e.branch_id = c.branch
                    LEFT JOIN miegacoa_prm.tbranch_group d ON d.branch_group_id = e.branch_group_id
                    WHERE b.group_name = 'Store Manager'
                    GROUP BY a.user_id
                    UNION
                    -- OTHERS
                    SELECT
                    a.user_id, a.user_name, a.user_nik, b.group_name, '-' AS region_managed, '-' AS branch_managed, a.is_active
                    FROM miegacoa_prm.tusers a
                    LEFT JOIN miegacoa_prm.tgroup_users b ON b.group_user_id = a.group_id
                    WHERE b.group_name NOT IN('Regional Manager', 'Area Manager', 'Store Manager')
                    GROUP BY a.user_id) all_data
                    ORDER BY all_data.user_id ASC 
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
}

?>