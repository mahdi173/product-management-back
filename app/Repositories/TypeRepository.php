<?php

namespace App\Repositories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

class TypeRepository
{  
    /**
     * getAll
     *
     * @return Collection
     */
    public function getAll(): Collection {
        return  Type::all();
    }
}