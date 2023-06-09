<?php

namespace App\Services;

use App\Repositories\TypeRepository;
use Illuminate\Database\Eloquent\Collection;

class TypeService
{            
    /**
     * __construct
     *
     * @param  TypeRepository $typeRepository
     * @return void
     */
    public function __construct( private TypeRepository $typeRepository)
    {
    }
    
    /**
     * getAllTypes
     *
     * @return Collection
     */
    public function getAllTypes(): Collection
    {
        return $this->typeRepository->getAll() ;
    }
}