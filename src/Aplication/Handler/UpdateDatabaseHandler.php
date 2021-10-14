<?php

declare(strict_types=1);

namespace App\Aplication\Handler;

use App\Aplication\Command\UpdateDatabaseCommand;
use App\Infrastructure\Entity\Data;
use App\Infrastructure\Entity\Setting;
use App\Aplication\Query\GetOptadInfoQuery;
use App\Infrastructure\Repository\DataRepository;
use App\Infrastructure\Repository\SettingRepository;

final class UpdateDatabaseHandler implements CommandHandlerInterface
{
    public function __construct(
        private GetOptadInfoQuery $query,
        private SettingRepository $settingRepository,
        private DataRepository $dataRepository
    ) {
    }

    public function __invoke(UpdateDatabaseCommand $command): void
    {
        $query = $this->query;
        $query = $query();
        $this->setSetting($query);
        $this->setData($query);
    }

    private function setSetting($query): void
    {
        $setting = new Setting(
            $query['settings']['currency'],
            $query['settings']['PeriodLength'],
            $query['settings']['groupby']
        );
        if (!$this->settingRepository->exists($setting)) {
            $this->settingRepository->save($setting);
        }
    }

    private function setData($query): void
    {
        foreach ($query['data'] as $entry) {
            $data = new Data(
                $entry[0],
                $entry[1],
                new \DateTime($entry[2]),
                $entry[3],
                $entry[4],
                $entry[5],
                $entry[6],
                $entry[7]
            );
            if (!$this->dataRepository->exists($data)) {
                $this->dataRepository->save($data);
            }
        }
    }
}
