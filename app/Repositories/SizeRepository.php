<?php

namespace App\Repositories;

use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;

class SizeRepository
{  
    /**
     * getAll
     *
     * @return Collection
     */
    public function getAll(): Collection {
        return  Size::all();
    }
}