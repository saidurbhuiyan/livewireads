<?php

namespace App\Libraries;

use App\Models\Offerwall;

class OfferwallClass
{
    public function getAll(): object
    {
        return Offerwall::paginate(10);
    }

    public function find(int $id): object
    {
        return Offerwall::find($id);
    }

    public function delete(int $id)
    {
        return Offerwall::find($id)->delete();
    }

    public function ReadAbleStatus(): array
    {
        return [
            0 => ['text' => 'Enable', 'color'=>'green'],
            1 => ['text' => 'Disable', 'color'=>'red'],
        ];

    }

}
