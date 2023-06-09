<?php

namespace App\Http\Controllers;

use App\Services\SizeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SizeController extends Controller
{    
    /**
     * __construct
     *
     * @param  SizeService $sizeService
     * @return void
     */
    public function __construct(private SizeService $sizeService)
    {
    }
    
    /**
     * index
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($this->sizeService->getAllSizes());
    }
}
