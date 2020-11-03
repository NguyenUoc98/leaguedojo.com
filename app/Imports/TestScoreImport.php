<?php

namespace App\Imports;

use App\Models\TestScore;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestScoreImport implements ToModel,WithHeadingRow,WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TestScore([
            'test_day' => $row['test_day'],
            'student_id' => $row['student_id'], 
            'kihon' => $row['kihon'], 
            'kata' => $row['kata'], 
            'kumite' => $row['kumite'], 
            'physical' => $row['physical'], 
            'total' => $row['total'], 
        ]);
    }
}
