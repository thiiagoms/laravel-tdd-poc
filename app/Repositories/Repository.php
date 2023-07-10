<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
    /**
     * @var mixed
     */
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
     * @param int $id
     * @return mixed
     */
    public function single(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $params
     * @return void
     */
    public function create(array $params)
    {
    }

    /**
     * @param int $id
     * @param array $params
     * @return void
     */
    public function update(int $id, array $params)
    {
    }

    public function delete(int $id)
    {
    }
}
