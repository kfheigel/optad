<?php

namespace App\Repository;

use App\Entity\Data;

interface DataRepositoryInterface
{
    public function save(Data $data): void;

    public function update(Data $data): void;
}