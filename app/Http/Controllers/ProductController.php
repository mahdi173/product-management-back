<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{    
    /**
     * __construct
     *
     * @param  mixed $productService
     * @param  mixed $imageService
     * @return void
     */
    public function __construct(private ProductService  $productService, private ImageService $imageService)
    {
    }
    
    /**
     * index
     *
     * @param  Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        return $this->productService->filter($request);
    }

    public function store(StoreProductRequest $request)
    {
        $data= $request->validated();
        $data["user_id"]= auth()->user()->id;
        $data["type_id"]= $request->type_id;

        if($request->file('image')){
            $data["photo_id"]= $this->imageService->storeImage($request->file('image'));
        }

        $response= $this->productService->storeProduct($data, $request->sizes);
        return response()->json($response);
    }

    public function show(Product $product): JsonResponse
    {
        return $this->productService->showProduct($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $data= $request->validated();
        $data["type_id"]= $request->type_id;

        if($request->file('image')){
            $data["photo_id"]= $this->imageService->storeImage($request->file('image'));
        } 

        $response= $this->productService->updateProduct($product, $data, $request->sizes);

        return response()->json($response);
    }

    public function destroy(Product $product): JsonResponse
    {
        $this->authorize('delete', $product);

        return $this->productService->deleteProduct($product);
    }
}
