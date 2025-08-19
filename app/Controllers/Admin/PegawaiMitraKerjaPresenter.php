<?php

namespace App\Controllers\Admin;

use App\Models\PegawaiMitraKerjaModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class PegawaiMitraKerjaPresenter extends ResourcePresenter
{
    protected $modelName = PegawaiMitraKerjaModel::class;
    /**
     * Present a view of resource objects.
     *
     * @return string
     */
    public function index(): string
    {
        $data = $this->model->join('prodi_pilihan', 'pegawai_mitra_kerja.prodi_pilihan_id = prodi_pilihan.id')
            ->findAll();
        return view('admin/pegawai-mitra-kerja/table', ['data' => $data]);
    }

    /**
     * Present a view to present a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function show($id = null): string
    {
        return view('errors/html/error_404', [
            'message' => 'Resource not found',
            'id' => $id,
        ]);
    }

    /**
     * Present a view to present a new single resource object.
     *
     * @return string
     */
    public function new()
    {
        return view('errors/html/error_404', [
            'message' => 'Resource creation not supported',
        ]);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return string
     */
    public function create()
    {
        return view('errors/html/error_404', [
            'message' => 'Resource creation not supported',
        ]);
    }

    /**
     * Present a view to edit the properties of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function edit($id = null)
    {
        return view('errors/html/error_404', [
            'message' => 'Resource not found',
            'id' => $id,
        ]);
    }

    /**
     * Process the updating, full or partial, of a specific resource object.
     * This should be a POST.
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function update($id = null)
    {
        return view('errors/html/error_404', [
            'message' => 'Resource not found',
            'id' => $id,
        ]);
    }

    /**
     * Present a view to confirm the deletion of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function remove($id = null)
    {
        return view('errors/html/error_404', [
            'message' => 'Are you sure you want to delete this resource?',
            'id' => $id,
        ]);
    }

    /**
     * Process the deletion of a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function delete($id = null)
    {
        return view('errors/html/error_404', [
            'message' => 'Are you sure you want to delete this resource?',
            'id' => $id,
        ]);
    }
}
