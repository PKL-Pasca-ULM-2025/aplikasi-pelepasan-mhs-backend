<?php

namespace App\Controllers;

use App\Models\AlumniPredikatPujianULMModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class AlumniPredikatPujianULMController extends ResourceController
{

    protected $modelName = AlumniPredikatPujianULMModel::class;

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
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
        if (!$this->request->header('Content-Type') === 'multipart/form-data') {
            return $this->fail('Invalid Content-Type', 415);
        }
        helper(['uuid_helper', 'tahun_ajaran_helper']);
        $berkas = $this->request->getFile('berkas');
        $data = $this->request->getPost();

        $date = new DateTime();


        //simpan berkas
        $filepath = WRITEPATH . 'uploads/' . $berkas->store();


        $input = [
            'id' => uuid(),
            'nama' => $data['nama'],
            'no_tpa_nim' => $data['no_tpa_nim'],
            'prodi_pilihan_id' => $data['prodi_pilihan_id'],
            'tahun_lulus' => $data['tahun_lulus'],
            'prodi_terakhir' => $data['prodi_terakhir'],
            'fakultas_terakhir' => $data['fakultas_terakhir'],
            'nim_terakhir' => $data['nim_terakhir'],
            'ipk' => $data['ipk'],
            'predikat' => $data['predikat'],
            'no_hp' => $data['no_hp'],
            'url_berkas' => $filepath,
            'periode_semester' => getPeriodeSemester($date),
            'tahun_ajaran' => getTahunAjaran($date),
            'created_at' => $date,
            'updated_at' => $date
        ];


        $this->model->insert($input);
        return $this->respond(['message' => 'Data berhasil di Tambahkan', 'data' => $input], 201, 'success');
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
