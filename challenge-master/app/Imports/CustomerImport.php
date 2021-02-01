<?php

namespace App\Imports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithValidation; 
use Throwable;

class CustomerImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new customer([
            'id_customer' => $row[0],
            'nama' => $row[1],
            'alamat' => $row[2], 
            'id_kelurahan' => $row[3],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function rules(): array{
        return[
            '*.0' => ['unique:customer,id_customer']
        ];
    }
}
