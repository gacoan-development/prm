<?php 
namespace App\Controllers;
use App\Models\M_user;

class Login extends BaseController
{
    public function index(){
        return view('index');
    }

    public function index2(){
        return view('index-new');
    }

    public function login_action(){
        $musers = new M_user();

        $nik = $this->request->getPost('nik_psm');
        $password = $this->request->getPost('pass_psm');

        $check = $musers->get_data($nik, $password);

        if($check){
            if (($check['user_nik'] == $nik) && ($check['password'] == $password)){
                session()->set('user_nik', $check['user_nik']);
                session()->set('user_nama', $check['user_name']);
                session()->set('user_group', $check['group_name']);
                session()->set('user_group_code', $check['group_user_id']);
                session()->set('managerial_area', $check['managerial_area']);
                return redirect()->to(base_url('dashboard'));
            } else {
                session()->setFlashdata('message', 'Username / Password salah. Silahkan periksa dan coba kembali.');
                return redirect()->to(base_url('/'));
            }
        }else{
            session()->setFlashdata('message', 'Username / Password salah. Silahkan periksa dan coba kembali.');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
?>