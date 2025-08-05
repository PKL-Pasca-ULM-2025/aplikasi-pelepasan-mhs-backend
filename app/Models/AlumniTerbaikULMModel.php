<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniTerbaikULMModel extends Model
{
    protected $table = 'alumni_terbaik_ulm';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = App\Entities\AlumniTerbaikULM::class;
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nama', 'no_tpa_nim', 'prodi_pilihan_id', 'tahun_lulus', 'prodi_terakhir', 'fakultas_terakhir', 'nim_terakhir', 'ipk', 'predikat', 'no_hp', 'url_berkas', 'created_at', 'updated_at', 'sk_dasar'];

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
