<?php
namespace App\Controllers;
use App\Models\M_pengelola;

class Pengelola extends BaseController
{
    public function pengelola_page(){
        return view('pengelola/display_pengelola');
    }
    public function get_pengelola_list(){
        $mpengelola = new M_pengelola();
        $result = $mpengelola->get_all();
        return json_encode($result);
    }

    public function form_pengelola(){
        $parkmanagement_id = $this->request->getGet('vendor');
        $data = [
            'parkmanagement_id' => $parkmanagement_id
        ];
        return view('pengelola/form_pengelola', $data);
    }

    public function get_resto_not_managed(){
        if($this->request->getGet('term') != null){
            $search_term = $this->request->getGet('term');
            $mpengelola = new M_pengelola();
            $result = $mpengelola->get_resto_not_managed($search_term);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function get_resto_not_managed_detail(){
        if($this->request->getGet('branch_id') != null){
            $branch_id = $this->request->getGet('branch_id');
            $mpengelola = new M_pengelola();
            $result = $mpengelola->get_resto_not_managed_detail($branch_id);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function get_data_by_id(){
        if($this->request->getPost('vendor_id') != null){
            $vendor_id = $this->request->getPost('vendor_id');
            $mpengelola = new M_pengelola();
            $result = $mpengelola->get_data_by_id($vendor_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function get_resto_managed(){
        if($this->request->getPost('vendor_id') != null){
            $vendor_id = $this->request->getPost('vendor_id');
            $mpengelola = new M_pengelola();
            $result = $mpengelola->get_resto_managed($vendor_id);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function save_form_pengelola(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $mpengelola = new M_pengelola();
            $result = $mpengelola->save_form_pengelola($data, $user_nik);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function update_form_pengelola(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $vendor_id = $this->request->getPost('vendor_id');
            $mpengelola = new M_pengelola();
            $result = $mpengelola->update_form_pengelola($data, $user_nik, $vendor_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function upload_pengelola(){
        $file = $this->request->getFile('pengelola_file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Generate a random name
            $file->move(WRITEPATH . 'vendor_attachments', $newName); // Move the file to the upload directory

            return $this->response->setJSON(['success' => true, 'message' => $newName]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to upload data']);
        }
    }

    public function update_uploaded_pengelola(){
        $vendor_id_upload = $this->request->getPost('vendor_id_upload');
        $filename = $this->request->getPost('filename');
        $mpengelola = new M_pengelola();
        $result = $mpengelola->update_uploaded_pengelola($vendor_id_upload, $filename);
        return json_encode($result);
    }
}
?>