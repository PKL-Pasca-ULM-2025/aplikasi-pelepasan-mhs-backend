<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper('excel_helper');
        $data = [];
        return view('welcome_message', ['data' => $data]);
    }

    public function pdf(){
        $input = $this->request->getGet();
    }
}
