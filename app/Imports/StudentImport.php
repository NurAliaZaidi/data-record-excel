<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $importStudent = new Students([
            'name' => $row['name'],
            'class' => $row['class'],
            'level' => $row['level'],
            'parent_contact' => $row['parentcontact'],
        ]);
        return $importStudent;
    }

    public function rules(): array
    {
        return [
            'name' => 'required | unique:students',
            'class' => 'required',
            'level' => 'required | integer',
            'parentcontact' => 'required',
        ];
    }
}
