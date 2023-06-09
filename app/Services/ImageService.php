<?php

namespace App\Services;

use App\Repositories\ImageRepository;

class ImageService
{            
    /**
     * __construct
     *
     * @param  ImageRepository $imageRepository
     * @return void
     */
    public function __construct( private ImageRepository $imageRepository)
    {
    }
    
    /**
     * storeImage
     *
     * @param  mixed $file
     * @return int
     */
    public function storeImage($file): int
    {
        $fileName= date('YmdHi').$file->getClientOriginalName();
        $image= $this->imageRepository->create(["src"=>$fileName]);
        return $image->id;
    }
}