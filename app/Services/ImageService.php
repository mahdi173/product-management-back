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

    public function storeImage($file): int
    {
        $fileName= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Images'), $fileName);
        $image= $this->imageRepository->create(["src"=>$fileName]);
        return $image->id;
    }
}