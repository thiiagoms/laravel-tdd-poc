<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;
use Illuminate\Http\{JsonResponse, Request, Response};

class CategoryController extends Controller
{
    /**
     * @param CategoryService $categoryService
     */
    public function __construct(private CategoryService $categoryService)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['categories' => $this->categoryService->index()], Response::HTTP_OK);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->categoryService->store($request->toArray());

        return response()->json([
            'status' => 'success',
            'message' => 'Resource created successfully',
            'data' => ['name' => $request->name]
        ], Response::HTTP_CREATED);
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return response()->json(['category' => $this->categoryService->show($id)], Response::HTTP_OK);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
