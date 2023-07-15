<?php

namespace App\Contracts\Category;

use App\Contracts\Contract;
use App\Models\Category\Category;

interface CategoryContract extends Contract
{
    /**
     * @param int $id
     * @return Category
     */
    public function single(int $id): Category;
}
