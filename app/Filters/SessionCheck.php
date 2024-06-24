<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SessionCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null){
        // Start session
        $session = session();
        
        // Check if session data exists, e.g., 'isLoggedIn'
        if(!$session->has('user_nik') || !$session->get('user_nik')){
            // If session doesn't exist, redirect to login page
            session()->setFlashdata('message', 'Anda telah logout. Silahkan login kembali.');
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        // Do something here if needed
    }
}