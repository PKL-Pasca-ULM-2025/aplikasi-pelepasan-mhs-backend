<?php

namespace App\Entities\Auth;

use CodeIgniter\Entity\Entity;

class Admin extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
