<?php

declare(strict_types=1);

namespace App\Query;

use App\Enum\OptadApiUrl;
use App\Infrastructure\HttpClient\OptadHttpClient;

class GetOptadInfoQuery
{
    public function __construct(private OptadHttpClient $optadHttpClient)
    {
    }

    public function __invoke(): string
    {
        $url = OptadApiUrl::URL();
        $response = $this->optadHttpClient->request($url->getValue());
        $data = $response->getContent();

        return $data;
    }
}
