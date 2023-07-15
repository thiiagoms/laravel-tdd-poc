<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Contracts\Category\CategoryContract;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Collection;

final class CategoryService
{
    /**
     * @param CategoryContract $categoryContract
     */
    public function __construct(private CategoryContract $categoryContract)
    {
    }

    /**
     * @param int|null $id
     * @return Category|Collection
     */
    private function getCategory(int|null $id = null): Category|Collection
    {
        return is_null($id) ? $this->categoryContract->all() : $this->categoryContract->single($id);
    }

    /**
     * @param array $params
     * @return array
     */
    private function getParams(array $params): array
    {
        return ['name' => strip_tags($params['name']), 'description' => strip_tags($params['description'])];
    }

    /**
     * @return Category|Collection
     */
    public function index(): Category|Collection
    {
        return $this->getCategory();
    }

    /**
     * @param int $id
     * @return Category|Collection
     */
    public function show(int $id): Category|Collection
    {
        return $this->getCategory($id);
    }

    /**
     * @param array $params
     * @return bool
     */
    public function store(array $params): bool
    {
        return $this->categoryContract->create($this->getParams($params));
    }

    /**
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function update(array $params, int $id): bool
    {
        return $this->categoryContract->update($params, $id) >= 0;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->categoryContract->delete($id) >= 0;
    }
}
