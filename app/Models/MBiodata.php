<?php

namespace App\Models;

use CodeIgniter\Model;

class MBiodata extends Model
{
    // Nama tabel di database
    protected $table = 'biodata';

    // Kunci utama tabel
    protected $primaryKey = 'id';

    // Field-field yang diizinkan untuk diisi (insert/update)
    protected $allowedFields = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'nomor_telepon'
    ];
}
