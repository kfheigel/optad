<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Data;

interface DataRepositoryInterface
{
    public function save(Data $data): void;

    public function exists(Data $data): bool;

}
