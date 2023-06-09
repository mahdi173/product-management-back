<?php

namespace App\Http\Controllers;

use App\Services\TypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TypeController extends Controller
{    
    /**
     * __construct
     *
     * @param  TypeService $typeService
     * @return void
     */
    public function __construct(private TypeService $typeService)
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
        return response()->json($this->typeService->getAllTypes());
    }
}
