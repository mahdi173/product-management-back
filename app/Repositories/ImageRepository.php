<?php

namespace App\Repositories;

use App\Models\Photo;

class ImageRepository
{     
   /**
    * create
    *
    * @param  array $data
    * @return Photo
    */
    public function create(array $data): Photo{
        return Photo::create($data);
    }
}