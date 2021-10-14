<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Setting;

interface SettingRepositoryInterface
{
    public function save(Setting $setting): void;

    public function exists(Setting $setting): bool;
}
