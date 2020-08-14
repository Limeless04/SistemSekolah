<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'id_siswa' => $row['id_siswa'],
            'nama' => $row['nama_siswa'],
            'no_hp_ortu' => $row['no_hp_ortu'],
            'kelas' => $row['kelas'],
            'nama_sekolah' => $row['nama_sekolah'],
            'alamat_sekolah' => $row['alamat_sekolah'],
            'npsn' => $row['npsn'],
            'jenjang' => $row['jenjang'],
            'email' => $row['email'],
            'password' => $row['password'],
        ]);
    }
}
