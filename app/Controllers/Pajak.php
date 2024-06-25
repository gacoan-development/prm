<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\M_pajak;

class Pajak extends BaseController
{
    public function index()
    {
        //
    }

    public function pajak_page(){
        return view('pajak/display_pajak');
    }

    public function get_pajak_list(){
        $mpajak = new M_pajak();
        $result = $mpajak->get_all();
        return json_encode($result);
    }

    public function get_data_by_id(){
        if($this->request->getPost('taxpay_id') != null){
            $taxpay_id = $this->request->getPost('taxpay_id');
            $mpajak = new M_pajak();
            $result = $mpajak->get_data_by_id($taxpay_id);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function form_pajak(){
        $taxpay_id = $this->request->getGet('id');
        $data = [
            'taxpay_id' => $taxpay_id
        ];
        return view('pajak/form_pajak', $data);
    }

    public function get_all_resto(){
        if($this->request->getGet('term') != null){
            $search_term = $this->request->getGet('term');
            $mpajak = new M_pajak();
            $result = $mpajak->get_all_resto($search_term);
            return json_encode($result);
        }else{
            return json_encode('');
        }
    }

    public function save_form_pajak(){
        if($this->request->getPost('data') != null){
            $data = $this->request->getPost('data');
            $user_nik = $this->request->getPost('user_nik');
            $mpajak = new M_pajak();
            $result = $mpajak->save_form_pajak($data, $user_nik);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }

    public function upload_pajak(){
        $file = $this->request->getFile('taxpay_file');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Generate a random name
            $file->move(WRITEPATH . 'taxpay_attachments', $newName); // Move the file to the upload directory

            return $this->response->setJSON(['success' => true, 'message' => $newName]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to upload data']);
        }
    }

    public function update_attachment(){
        if($this->request->getPost('filename') != null){
            $filename = $this->request->getPost('filename');
            $taxpay_id = $this->request->getPost('taxpay_id');
            $mpajak = new M_pajak();
            $result = $mpajak->update_attachment($taxpay_id, $filename);
            return json_encode($result);
        }else{
            return 'code_clear';
        }
    }
}
