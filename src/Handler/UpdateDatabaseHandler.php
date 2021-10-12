<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\UpdateDatabaseCommand;
use App\Entity\Data;
use App\Entity\Setting;
use App\Query\GetOptadInfoQuery;
use App\Repository\DataRepository;
use App\Repository\SettingRepository;

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
        $this->settingRepository->save($setting);
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
            $this->dataRepository->save($data);
        }
    }
}
