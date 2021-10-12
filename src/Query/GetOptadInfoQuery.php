<?php

declare(strict_types=1);

namespace App\Query;

use App\Entity\Data;
use App\Enum\OptadApiUrl;
use App\Infrastructure\HttpClient\OptadHttpClient;
use Symfony\Component\Serializer\SerializerInterface;

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
