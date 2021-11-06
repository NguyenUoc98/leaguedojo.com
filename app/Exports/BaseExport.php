<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaseExport implements FromQuery,WithHeadings
{
    use Exportable;

    public function __construct(array $ids, array $fields, $model)
    {
        $this->ids = $ids;
        $this->fields = $fields;
        $this->model = $model;
    }

    public function query()
    {
        $query = app($this->model)->query();
        if(!empty($this->ids)) {
            $query = $query->whereIn('id', $this->ids);
        }

        if(!empty($this->fields)) {
            $query = $query->select($this->fields);
        }
        return $query;
    }
    
    public function headings(): array
    {
        return $this->fields;
    }
}
