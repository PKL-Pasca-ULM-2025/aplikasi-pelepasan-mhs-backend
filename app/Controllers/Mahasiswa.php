<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;

class Mahasiswa extends ResourceController
{
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
        $MahasiswaModel = new MahasiswaModel();
        $data = $MahasiswaModel->findAll();
        return $this->respond($data, 200, 'success');
    }

    public function export() {
        helper('excel_helper');
        $file_name = 'data.xlsx';
        $MahasiswaModel = new MahasiswaModel();
        $data = $MahasiswaModel->findAll();
        $col = ['nama', 'nim', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'sks', 'ipk', 'lama_studi', 'prodi', 'tanggal_bayar', 'biaya'];
        export_excel($data,$col, $file_name);

        header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);
		exit;
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        return $this->respond(null,501,'failed');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return $this->respond(null,501,'failed');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper('uuid');
        $time = Time::now('utc');
        $mahasiswa = new MahasiswaModel();

        //data validation
        $rules = [
            'nama' =>'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|valid_date',
            'sks' => 'required|decimal',
            'ipk' => 'required|decimal',
            'prodi' => 'required',
            'lama_studi' => 'required|decimal',
            'tanggal_bayar' => 'required|valid_date',
            'biaya' => 'required'
        ];

        $input = $this->request->getJSON();

        $data = [
            'id' => uuid(),
            'nama' => $input->nama,
            'nim' => $input->nim,
            'jenis_kelamin' => $input->jenis_kelamin,
            'tempat_lahir' => $input->tempat_lahir,
            'tanggal_lahir' => $input->tanggal_lahir,
            'sks' => $input->sks,
            'ipk' => $input->ipk,
            'prodi' => $input->prodi,
            'lama_studi' => $input->lama_studi,
            'tanggal_bayar' => $input->tanggal_bayar,
            'biaya' => $input->biaya,
            'created_at' => $time,
            'updated_at' => $time
        ];

        if (!$this->validateData($data, $rules)) {
            return $this->respond(null, 400, 'Bad Request');
        }

        //insert data
        $mahasiswa->save($data);
        return $this->respond(null,201, 'success');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        return $this->respond(null,501,'failed');
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        return $this->respond(null,501,'failed');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        return $this->respond(null,501,'failed');
    }
}
