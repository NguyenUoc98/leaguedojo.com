<?php

namespace App\Imports;

use App\Models\Student;
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
            'id' => $row['id'],
            'name' => $row['name'],
            'phone' => $row['phone'],
            'cmnd' => $row['cmnd'],
            'birthday' => $row['birthday'],
            'address' => $row['address'],
            'type' => $row['type'],
            'work_unit' => $row['work_unit'],
            'kuy' => $row['kuy'],
            'weight' => $row['weight'],
            'height' => $row['height'],
            'sex' => $row['sex'],
            'link_fb' => $row['link_fb'],
            'admission_day' => $row['admission_day'],
            'status' => $row['status'],
        ]);
    }
}
