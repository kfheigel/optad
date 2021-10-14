<?php

declare(strict_types=1);

namespace App\Aplication\Query;

use App\Infrastructure\Enum\OptadApiUrl;
use App\Infrastructure\HttpClient\OptadHttpClient;

class GetOptadInfoQuery
{
    public function __construct(private OptadHttpClient $optadHttpClient)
    {
    }

    public function __invoke(): array
    {
        $url = OptadApiUrl::URL();
        $response = $this->optadHttpClient->request($url->getValue());
        $data = $response->getContent();

        return json_decode($data, true);
    }
}
