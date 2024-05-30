<?php

namespace App\Libraries;
use App\Models\Shortlink;

class ShortlinkClass
{
    public function getAll(): object
    {
        return Shortlink::paginate(10);
    }

    public function find(int $id): object
    {
        return Shortlink::find($id);
    }

    public function delete(int $id)
    {
        return Shortlink::find($id)->delete();
    }

    public function ReadAbleStatus(): array
    {
        return [
            0 => ['text' => 'Enable', 'color'=>'green'],
            1 => ['text' => 'Disable', 'color'=>'red'],
        ];

    }
}


