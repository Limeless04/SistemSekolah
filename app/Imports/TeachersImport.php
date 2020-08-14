<?php

namespace App\Imports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'id_guru' => $row['id_guru'],
            'nama_guru' => $row['nama_guru'],
            'no_hp_guru' => $row['no_hp_guru'],
            'nama_sekolah' => $row['nama_sekolah'],
            'alamat_sekolah' => $row['alamat_sekolah'],
            'npsn' => $row['npsn'],
            'jenjang' => $row['jenjang'],
            'email' => $row['email'],
            'password' => $row['password'],
        ]);
    }
}
