<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = array();
        $session = session();
        $data['session'] = $session;
        return view('home', $data);
    }
}
