<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;

class Mahasiswa extends ResourceController
{
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
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
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
        //
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
        //
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
        //
    }
}
