<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\ResponseInterface;

class UploadController extends BaseController
{
    protected $helpers = ['form', 'excel_helper'];

    public function index()
    {
        return view('form/upload_form', ['errors' => []]);
    }

    public function upload()
    {
        $validationRule = [
            'input-file' => [
                'label' => 'Excel File',
                'rules' => [
                    'uploaded[input-file]',
                    'ext_in[input-file,xlsx,xls]',
                    'mime_in[input-file,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel]',
                    'max_size[input-file,2048]',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('form/upload_form', $data);
        }
        $file = $this->request->getFile('input-file');

        if (!$file->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $file->store();

            $data_mahasiswa = import_xlsx($filepath, 'Peminat_Gel.1');

            $data = ['uploaded_fileinfo' => new File($filepath), 'data' => $data_mahasiswa];

            return view('form/success/upload_success', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('upload_form', $data);
    }
}
