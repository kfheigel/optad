<?php

declare(strict_types=1);

namespace App\Query;

use App\Repository\DataRepositoryInterface;
use App\Repository\SettingRepository;

final class GetOptadDatabaseInfoQuery
{
    public function __construct(
        private DataRepositoryInterface $dataRepository,
        private SettingRepository $settingRepository
    ) {
    }

    public function __invoke(): array
    {
        $dataArray = [];
        $setting = $this->settingRepository->findAll();
        $data = $this->dataRepository->findAll();

        $dataArray['settings'] = $setting[0];
        $dataArray['data'] = $data;
        dump($dataArray);
        return $dataArray;


    }
}
