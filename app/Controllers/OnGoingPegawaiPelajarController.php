<?php

namespace App\Controllers;

use DateTime;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class OnGoingPegawaiPelajarController extends ResourceController
{
    protected $modelName = \App\Models\OnGoingPegawaiPelajarModel::class;
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->model->join('prodi_pilihan', 'on_going_pegawai_pelajar.prodi_pilihan_id = prodi_pilihan.id')
            ->findAll();
        return $this->respond(['message' => 'List On Going Pegawai Pelajar', 'data' => $data], 200, 'OK');
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
        $rules = [
            'nama' => 'required|string|max_length[255]',
            'nim' => 'required|string|max_length[255]',
            'prodi_pilihan_id' => 'required|is_not_unique[prodi_pilihan.id]',
            'unit_kerja' => 'required|string|max_length[255]',
            'pekerjaan_di_ulm_saat_ini' => 'required|string|max_length[255]',
            'no_hp' => 'required|string|max_length[255]',
            'posisi_semester' => 'required|integer',
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

        // Use a fully qualified name or add `use DateTime;` at the top.
        $date = new DateTime();

        $input = [
            'id' => uuid(),
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'prodi_pilihan_id' => $this->request->getPost('prodi_pilihan_id'),
            'unit_kerja' => $this->request->getPost('unit_kerja'),
            'pekerjaan_di_ulm_saat_ini' => $this->request->getPost('pekerjaan_di_ulm_saat_ini'),
            'no_hp' => $this->request->getPost('no_hp'),
            'posisi_semester' => $this->request->getPost('posisi_semester'),
            'url_berkas' => $filepath,
            'periode_semester' => getPeriodeSemester($date),
            'tahun_ajaran' => getTahunAjaran($date),
            'created_at' => $date->format('Y-m-d H:i:s'),
            'updated_at' => $date->format('Y-m-d H:i:s'),
        ];

        if ($this->model->insert($input) === false) {
            return $this->failServerError('Gagal menyimpan data ke database.');
        }
        return $this->respondCreated(['message' => 'Data berhasil di Tambahkan', 'data' => $input]);
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
