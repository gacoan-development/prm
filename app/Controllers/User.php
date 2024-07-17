<?php 
namespace App\Controllers;
use App\Models\M_user;

class User extends BaseController
{
    public function users_page(){
        return view('user_management/display_users');
    }

    public function get_all(){
        $muser = new M_user();
        $result = $muser->get_all();
        return json_encode($result);
    }

    public function form_users(){
        $user_id = $this->request->getGet('user');
        $data = [
            'user_id' => $user_id
        ];
        return view('user_management/form_users', $data);
    }

    public function get_all_resto(){
        if($this->request->getGet('term') != null){
            $search_term = $this->request->getGet('term');
            $muser = new M_user();
            $result = $muser->get_all_resto($search_term);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function get_master_group_users(){
        $muser = new M_user();
        $result = $muser->get_master_group_users();
        return json_encode($result);
    }

    public function get_master_wilayah_users(){
        $muser = new M_user();
        $result = $muser->get_master_wilayah_users();
        return json_encode($result);
    }

    // public function index2(){
    //     return view('index-new');
    // }

    // public function login_action(){
    //     $musers = new M_user();

    //     $nik = $this->request->getPost('nik_psm');
    //     $password = $this->request->getPost('pass_psm');

    //     $check = $musers->get_data($nik, $password);

    //     if($check){
    //         if (($check['user_nik'] == $nik) && ($check['password'] == $password)){
    //             session()->set('user_nik', $check['user_nik']);
    //             session()->set('user_nama', $check['user_name']);
    //             session()->set('user_group', $check['group_name']);
    //             session()->set('user_group_code', $check['group_user_id']);
    //             session()->set('managerial_area', $check['managerial_area']);
    //             return redirect()->to(base_url('dashboard'));
    //         } else {
    //             session()->setFlashdata('message', 'Username / Password salah. Silahkan periksa dan coba kembali.');
    //             return redirect()->to(base_url('/'));
    //         }
    //     }else{
    //         session()->setFlashdata('message', 'Username / Password salah. Silahkan periksa dan coba kembali.');
    //         return redirect()->to(base_url('/'));
    //     }
    // }

    // public function logout(){
    //     session()->destroy();
    //     return redirect()->to(base_url('/'));
    // }
}
?>