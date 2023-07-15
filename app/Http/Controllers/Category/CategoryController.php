<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $result = $this->categoryService->store($request->toArray());

        $result = $result === true
            ? ['message' => 'Resource created', 'status' => Response::HTTP_CREATED]
            : ['message' => 'Error', 'status' => Response::HTTP_INTERNAL_SERVER_ERROR];

        return response()->json(['message' => $result['message']], $result['status']);
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
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        $result = $this->categoryService->update($request->toArray(), $id);

        $result = $result === true
            ? ['message' => 'updated', 'status' => Response::HTTP_CREATED]
            : ['message' => 'error',   'status' => Response::HTTP_INTERNAL_SERVER_ERROR];

        return response()->json(['message' => $result['message']], $result['status']);
    }

    /**
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = $this->categoryService->destroy($id);

        $result = $result === true
            ? ['status' => Response::HTTP_NO_CONTENT]
            : ['status' => Response::HTTP_INTERNAL_SERVER_ERROR];

        return response()->json([], $result['status']);
    }
}
