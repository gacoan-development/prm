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
}

?>