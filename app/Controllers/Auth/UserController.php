<?php

namespace App\Controllers\Auth;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourcePresenter;
use CodeIgniter\Shield\Entities\User;

class UserController extends ResourcePresenter
{
    protected $modelName = \App\Models\Auth\UserModel::class;
    public function index()
    {
        $data = $this->model->select('id, no_tpa, created_at, updated_at')->findAll();
        return view("admin/user/table", ["data" => $data]);
    }

    public function new()
    {
        return view('form/upload_form', ['errors' => []]);
    }

    public function create()
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
        helper(['excel_helper', 'uuid_helper']);

        $userModel = auth()->getProvider();

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            return view('form/upload_form', $data);
        }
        $file = $this->request->getFile('input-file');

        $filePath = WRITEPATH . 'uploads/' . $file->store();

        $input = import_xlsx($filePath);
        $dataToInsert = [];
        $time = Time::now();
        foreach ($input as $row) {
            $userModel->save(new User([
                'username' => $row['no_tpa'],
                'email' => null,
                'password' => password_hash($row['password'], PASSWORD_DEFAULT),
            ]));
        }

        unlink($filePath); // Clean up the uploaded file

        return redirect()->to('/')->with('message', 'Users imported successfully!');

    }
}
