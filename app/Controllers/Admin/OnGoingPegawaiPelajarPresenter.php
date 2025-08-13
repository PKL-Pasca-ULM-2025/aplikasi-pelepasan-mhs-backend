<?php

namespace App\Controllers\Admin;

use App\Models\OnGoingPegawaiPelajarModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourcePresenter;

class OnGoingPegawaiPelajarPresenter extends ResourcePresenter
{
    protected $modelName = OnGoingPegawaiPelajarModel::class;
    /**
     * Present a view of resource objects.
     *
     * @return string
     */
    public function index()
    {
        $data = $this->model->join('prodi_pilihan', 'on_going_pegawai_pelajar.prodi_pilihan_id = prodi_pilihan.id')
            ->findAll();
        return view('admin/on-going-pegawai-pelajar/table', ['data' => $data]);
    }

    /**
     * Present a view to present a specific resource object.
     *
     * @param int|string|null $id
     *
     * @return string
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Present a view to present a new single resource object.
     *
     * @return string
     */
    public function new()
    {
        //
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return string
     */
    public function create()
    {
        //
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
        //
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
        //
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
        //
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
        //
    }
}
