<?php

namespace App\Models;

use CodeIgniter\Model;

class CalonPegawaiPelajarModel extends Model
{
    protected $table = 'calon_pegawai_pelajar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = \App\Entities\CalonPegawaiPelajar::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['periode_semester', 'tahun_ajaran', 'prodi_pilihan_id', 'nama', 'no_tpa_nim', 'created_at', 'updated_at', 'deleted_at', 'unit_kerja', 'pekerjaan_di_ulm_saat_ini', 'no_hp', 'url_berkas'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
