<?php

namespace App\Services;

use App\Repositories\SizeRepository;
use Illuminate\Database\Eloquent\Collection;

class SizeService
{            
    /**
     * __construct
     *
     * @param  SizeRepository $sizeRepository
     * @return void
     */
    public function __construct( private SizeRepository $sizeRepository)
    {
    }
    
    /**
     * getAllSizes
     *
     * @return Collection
     */
    public function getAllSizes(): Collection
    {
        return $this->sizeRepository->getAll() ;
    }
}