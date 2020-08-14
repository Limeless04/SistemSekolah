<?php

namespace App\Imports;

use App\Quest;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Quest([
            'paket_soal' => $row['paket_soal'],
            'mapel' => $row['mapel'],
            'soal' => $row['soal'],
            'jenis_soal' => $row['jenis_soal'],
            'a' => $row['a'],
            'b' => $row['b'],
            'c' => $row['c'],
            'd' => $row['d'],
            'e' => $row['e'],
            'jawaban' => $row['jawaban'],
            'nama_guru' => $row['nama_guru'],
        ]);
    }
}
