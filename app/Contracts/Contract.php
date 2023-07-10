<?php

namespace App\Contracts;

interface Contract
{
    public function create(array $params);

    public function all();

    public function single(int $id);

    public function update(int $id, array $params);

    public function delete(int $id);
}
