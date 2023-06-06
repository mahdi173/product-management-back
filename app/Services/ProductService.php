<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{            
    /**
     * __construct
     *
     * @param  ProductRepository $productRepository
     * @return void
     */
    public function __construct( private ProductRepository $productRepository)
    {
    }

    public function storeProduct(array $data, array $sizes)
    {  
       $product= $this->productRepository->create($data);
       $product->sizes()->attach($sizes);
       return $product->load('type', 'photo', 'sizes');
    }

    public function updateProduct(Product $product, array $data, array $sizes){
        $this->productRepository->update($data, $product);
        $product->sizes()->sync($sizes);

        return $product->load('type', 'photo', 'sizes');
    }

    public function showProduct(Product $product)
    {
        return response()->json( $this->productRepository->show($product));
    }

    public function deleteProduct(Product $product)
    {
        $this->productRepository->delete($product);
        return response()->json(["msg"=>"Product successfully deleted!"]);
    }
}