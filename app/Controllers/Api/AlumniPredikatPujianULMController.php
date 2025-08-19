<?php

namespace App\Controllers\Api;

use App\Models\AlumniPredikatPujianULMModel;
use App\Models\DiscountModel;
use App\Models\ProdiPilihanModel;
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
        $rows = $this->model
            ->join('prodi_pilihan', 'alumni_predikat_pujian_ulm.prodi_pilihan_id = prodi_pilihan.id')
            ->join('discount', 'alumni_predikat_pujian_ulm.discount_id = discount.id')
            ->findAll();

        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'id' => $row->id,
                'nama' => $row->nama,
                'no_tpa_nim' => $row->no_tpa_nim,
                'prodi_pilihan_id' => $row->prodi_pilihan_id,
                'prodi_pilihan' => [
                    'nama_prodi' => $row->nama_prodi,
                    'jenjang' => $row->jenjang,
                ],
                'tahun_lulus' => $row->tahun_lulus,
                'prodi_terakhir' => $row->prodi_terakhir,
                'fakultas_terakhir' => $row->fakultas_terakhir,
                'nim_terakhir' => $row->nim_terakhir,
                'ipk' => $row->ipk,
                'predikat' => $row->predikat,
                'no_hp' => $row->no_hp,
                'sk_dasar' => $row->sk_dasar,
                'url_berkas' => $row->url_berkas,
                'periode_semester' => $row->periode_semester,
                'tahun_ajaran' => $row->tahun_ajaran,
                'discount_id' => $row->discount_id,
                'discount' => [
                    'discount_sem_1' => $row->discount_sem_1,
                    'discount_sem_2' => $row->discount_sem_2,
                    'discount_sem_3' => $row->discount_sem_3,
                    'discount_sem_4' => $row->discount_sem_4,
                    'discount_sem_5' => $row->discount_sem_5,
                    'discount_sem_6' => $row->discount_sem_6,
                ],
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
            ];
        }
        return $this->respond(['message' => 'List Alumni Predikat Pujian ULM', 'data' => $data], 200, 'OK');
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

        if (strpos($this->request->getHeaderLine('Content-Type'), 'multipart/form-data') === false) {
            // 415 is Unsupported Media Type
            return $this->fail('The request must be a multipart/form-data.', 415);
        }


        $rules = [
            'nama' => 'required|string|max_length[255]',
            'no_tpa_nim' => 'required|string|max_length[255]',
            'prodi_pilihan_id' => 'required|is_not_unique[prodi_pilihan.id]',
            'tahun_lulus' => 'required|integer|exact_length[4]',
            'prodi_terakhir' => 'required|string|max_length[255]',
            'fakultas_terakhir' => 'required|string|max_length[255]',
            'nim_terakhir' => 'required|string|max_length[255]',
            'ipk' => 'required|decimal',
            'predikat' => 'required|in_list[sangat_memuaskan,pujian]',
            'no_hp' => 'required|string|max_length[255]',
            'sk_dasar' => 'permit_empty|string|max_length[255]',
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

        // Load the discount helper
        helper('discount_helper');

        $prodiModel = new ProdiPilihanModel();
        $prodi = $prodiModel->find($this->request->getPost('prodi_pilihan_id'));
        $discount = get_discount($prodi->jenjang, 'alumni_predikat_pujian_ulm');
        $discount_id = uuid();

        $discount_data = [
            'id' => $discount_id,
            'discount_sem_1' => $discount['1'],
            'discount_sem_2' => $discount['2'],
            'discount_sem_3' => $discount['3'],
            'discount_sem_4' => $discount['4'],
            'discount_sem_5' => $discount['5'],
            'discount_sem_6' => $discount['6'],
        ];

        $discount_model = new DiscountModel();
        $discount_model->insert($discount_data);

        $input = [
            'id' => uuid(),
            'nama' => $this->request->getPost('nama'),
            'no_tpa_nim' => $this->request->getPost('no_tpa_nim'),
            'prodi_pilihan_id' => $this->request->getPost('prodi_pilihan_id'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
            'prodi_terakhir' => $this->request->getPost('prodi_terakhir'),
            'fakultas_terakhir' => $this->request->getPost('fakultas_terakhir'),
            'nim_terakhir' => $this->request->getPost('nim_terakhir'),
            'ipk' => $this->request->getPost('ipk'),
            'predikat' => $this->request->getPost('predikat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'sk_dasar' => $this->request->getPost('sk_dasar'),
            'url_berkas' => $filepath,
            'periode_semester' => getPeriodeSemester($date),
            'tahun_ajaran' => getTahunAjaran($date),
            'discount_id' => $discount_id,
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
