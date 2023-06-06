<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{     
   /**
    * create
    *
    * @param  array $data
    * @return Product
    */
    public function create(array $data): Product{
        return Product::create($data);
    }
    
    /**
     * update
     *
     * @param  array $data
     * @param  Product $product
     * @return void
     */
    public function update(array $data, Product $product){
        $product->update($data);
    }

    public function show(Product $product){
       return $product->load('type', 'photo', 'sizes');
    }

    public function delete(Product $product){
        $product->delete($product);
    }
}