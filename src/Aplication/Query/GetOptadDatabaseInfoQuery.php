<?php

declare(strict_types=1);

namespace App\Aplication\Query;

use App\Infrastructure\Repository\DataRepositoryInterface;
use App\Infrastructure\Repository\SettingRepository;

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

        $dataArray['settings'] = $this->settingArrayConvert($setting);
        $dataArray['data'] = $this->dataArrayConvert($data);

        return $dataArray;
    }

    private function settingArrayConvert($settingArray)
    {
        $convertedSetting = [];
        $convertedSettings = [];
        foreach ($settingArray as $setting) {
            $convertedSetting['currency'] = $setting->getCurrency();
            $convertedSetting['PeriodLength'] = $setting->getPeriodLength();
            $convertedSetting['groupby'] = $setting->getGroupBy();
            $convertedSettings[] = $convertedSetting;
        }
        return $convertedSettings;
    }

    private function dataArrayConvert($dataArray)
    {
        $convertedData = [];
        $convertedDatas = [];
        foreach ($dataArray as $data) {
            $convertedData['url'] = $data->getUrl();
            $convertedData['tag'] = $data->getTag();
            $convertedData['date'] = $data->getDate()->format('Y-m-d');
            $convertedData['estimatedRevenue'] = $data->getEstimatedRevenue();
            $convertedData['adImpressions'] = $data->getAdImpressions();
            $convertedData['adEcpm'] = $data->getAdEcpm();
            $convertedData['clicks'] = $data->getClicks();
            $convertedData['adCtr'] = $data->getAdCtr();

            $convertedDatas[] = $convertedData;
        }
        return $convertedDatas;
    }
}
