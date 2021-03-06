<?php

namespace App\Imports;

use App\User;
use Session;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUsers implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[7] != 0 && $row[7] != 1) {
            $row[9] = $row[8];
            $row[8] = $row[7];
            $row[7] = 0;
        }
        // dd($row); Variables not nulled
        return new User([
            'name' => Session::get('row')[1],
            'username' => Session::get('row')[2],
            'email' => Session::get('row')[3],
            'password' => Session::get('row')[5],
            'admin' => Session::get('row')[7],
        ]);
        // dd($row); After returning data $row = nulled
    }
}
