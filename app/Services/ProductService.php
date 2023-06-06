<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use stdClass;

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
    
    /**
     * storeProduct
     *
     * @param  array $data
     * @param  array $sizes
     * @return mixed
     */
    public function storeProduct(array $data, array $sizes): mixed
    {  
       $product= $this->productRepository->create($data);
       $product->sizes()->attach($sizes);
       return $product->load('type', 'photo', 'sizes');
    }
    
    /**
     * updateProduct
     *
     * @param  Product $product
     * @param  array $data
     * @param  array $sizes
     * @return mixed
     */
    public function updateProduct(Product $product, array $data, array $sizes): mixed{
        $this->productRepository->update($data, $product);
        $product->sizes()->sync($sizes);

        return $product->load('type', 'photo', 'sizes');
    }
    
    /**
     * showProduct
     *
     * @param  Product $product
     * @return JsonResponse
     */
    public function showProduct(Product $product): JsonResponse
    {
        return response()->json( $this->productRepository->show($product));
    }
    
    /**
     * deleteProduct
     *
     * @param  Product $product
     * @return JsonResponse
     */
    public function deleteProduct(Product $product): JsonResponse
    {
        $this->productRepository->delete($product);
        return response()->json(["msg"=>"Product successfully deleted!"]);
    }
    
    /**
     * filter
     *
     * @param  Request $request
     * @return mixed
     */
    public function filter(Request $request): mixed
    {           
        $filter= Product::filter($request->input('filters'));
       
        return $filter->paginate(6);
    }
}