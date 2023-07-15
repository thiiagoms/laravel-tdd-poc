<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface Contract
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param array $params
     * @return bool
     */
    public function create(array $params): bool;

    /**
     * @param array $params
     * @param int $id
     * @return int
     */
    public function update(array $params, int $id): int;

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int;
}
