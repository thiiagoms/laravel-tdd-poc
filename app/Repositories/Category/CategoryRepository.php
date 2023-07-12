<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\Contracts\Category\CategoryContract;
use App\Models\Category\Category;
use App\Repositories\Repository;

final class CategoryRepository extends Repository implements CategoryContract
{
    protected $model = Category::class;
}
