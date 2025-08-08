<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use \App\Models\PegawaiMitraKerjaModel;
use DateTime;

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

        if (strpos($this->request->getHeaderLine('Content-Type'), 'multipart/form-data') === false) {
            // 415 is Unsupported Media Type
            return $this->fail('The request must be a multipart/form-data.', 415);
        }

        $rules = [
            'prodi_pilihan_id' => 'required|is_not_unique[prodi_pilihan.id]',
            'nama' => 'required|string|max_length[255]',
            'no_tpa_nim' => 'required|string|max_length[255]',
            'fakultas_terakhir' => 'required|string|max_length[255]',
            'prodi_terakhir' => 'required|string|max_length[255]',
            'no_hp' => 'required|string|max_length[255]',
            'berkas' => [
                'label' => 'Berkas',
                'rules' => 'uploaded[berkas]|max_size[berkas,5120]|ext_in[berkas,pdf,doc,docx,jpg,jpeg,png]',
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        helper(['uuid_helper', 'tahun_ajaran_helper']);

        $berkas = $this->request->getFile('berkas');

        // The file has already been validated, so we can safely move it.
        $filepath = WRITEPATH . 'uploads/' . $berkas->store();

        $date = new DateTime();

        $data = [
            'id' => uuid(),
            'prodi_pilihan_id' => $this->request->getPost('prodi_pilihan_id'),
            'nama' => $this->request->getPost('nama'),
            'no_tpa_nim' => $this->request->getPost('no_tpa_nim'),
            'fakultas_terakhir' => $this->request->getPost('fakultas_terakhir'),
            'prodi_terakhir' => $this->request->getPost('prodi_terakhir'),
            'no_hp' => $this->request->getPost('no_hp'),
            'periode_semester' => getPeriodeSemester($date),
            'tahun_ajaran' => getTahunAjaran($date),
            'url_berkas' => $filepath,
        ];

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
