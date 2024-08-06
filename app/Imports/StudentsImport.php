<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'number'        => $row[0],
            'name'              => $row[1],
            'grade'             => $row[2],
            'student_case_desc' => $row[3],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000; 
    }
}
