<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper('excel_helper');
        $data = import_xlsx('temp/sampel_kirim.xlsx', 'Peminat_Gel.1');
        return view('welcome_message', ['data' => $data]);
    }
}
