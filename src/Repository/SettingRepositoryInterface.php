<?php

namespace App\Repository;

use App\Entity\Setting;

interface SettingRepositoryInterface
{
    public function save(Setting $setting): void;

    public function exists(Setting $setting): bool;
}
