<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\Contracts\Category\CategoryContract;
use App\Models\Category\Category;
use App\Repositories\Repository;

final class CategoryRepository extends Repository implements CategoryContract
{
    /**
     * @var Category
     */
    protected $model = Category::class;

    /**
     * @param int $id
     * @return Category
     */
    public function single(int $id): Category
    {
        return $this->model->find($id);
    }
}
