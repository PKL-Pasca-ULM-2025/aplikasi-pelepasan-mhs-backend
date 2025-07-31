<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\RESTful\ResourceController;
use \App\Models\PegawaiMitraKerjaModel;

class PegawaiMitraKerjaController extends ResourceController
{

    protected $format = 'json';
    protected $modelName = PegawaiMitraKerjaModel::class;

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        // Logic to retrieve and return a list of Pegawai Mitra Kerja
        // This could involve fetching data from a model and returning it as JSON or in a view
        $data = $this->model->join('prodi_pilihan', 'pegawai_mitra_kerja.prodi_pilihan_id = prodi_pilihan.id')
            ->findAll();
        return $this->respond(['message' => 'List of Pegawai Mitra Kerja', 'data' => $data], 200, 'success');
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
        $data = $this->model->join('prodi_pilihan', 'pegawai_mitra_kerja.prodi_pilihan_id = prodi_pilihan.id')
            ->find($id);
        return $this->respond(['message' => 'List of Pegawai Mitra Kerja', 'data' => $data], 200, 'success');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return $this->respond(null, 501, 'Not Implemented');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if (!$this->request->header('Content-Type') === 'application/x-www-form-urlencoded') {
            return $this->fail('Invalid Content-Type', 415);
        }
        helper('uuid');
        // Validate the input data
        $rules = [
            'id' => 'required',
            'prodi_pilihan_id' => 'required',
            'nama' => 'required|max_length[255]',
            'no_tpa_nim' => 'required|max_length[50]',
            'fakultas_terakhir' => 'required|max_length[255]',
            'prodi_terakhir' => 'required|max_length[255]',
            'no_hp' => 'required|max_length[20]',
            'url_berkas' => 'required|valid_url',
        ];
        $input = $this->request->getPost();
        $time = Time::now('utc');
        $data = [
            'id' => uuid(),
            'prodi_pilihan_id' => $input['prodi_pilihan_id'],
            'nama' => $input['nama'],
            'no_tpa_nim' => $input['no_tpa_nim'],
            'fakultas_terakhir' => $input['fakultas_terakhir'],
            'prodi_terakhir' => $input['prodi_terakhir'],
            'no_hp' => $input['no_hp'],
            'periode_semester' => $input['periode_semester'],
            'tahun_ajaran' => $input['tahun_ajaran'],
            'url_berkas' => $input['url_berkas'],
            'created_at' => $time,
            'updated_at' => $time
        ];

        if (!$this->validateData($data, $rules)) {
            return $this->respond(null, 400, 'Bad Request');
        }

        $this->model->insert($data);
        return $this->respondCreated(['message' => 'Pegawai Mitra Kerja created successfully', 'data' => $data], 'success');

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
        return $this->respond(null, 501, 'Not Implemented');
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
        return $this->respond(null, 501, 'Not Implemented');
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
        return $this->respond(null, 501, 'Not Implemented');
    }
}
