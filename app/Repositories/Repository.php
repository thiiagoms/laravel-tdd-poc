<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
    protected $model;

    /**
     * @return mixed
     */
    private function handle(): mixed
    {
        return app($this->model);
    }

    /**
     * @return void
     */
    public function __construct()
    {
        $this->model = $this->handle();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $params
     * @return bool
     */
    public function create(array $params): bool
    {
        $result = $this->model->create($params);

        return $result instanceof $this->model;
    }

    /**
     * @param array $params
     * @param int $id
     * @return int
     */
    public function update(array $params, int $id): int
    {
        return $this->model->where(['id' => $id])->update($params);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->model->destroy($id);
    }
}
