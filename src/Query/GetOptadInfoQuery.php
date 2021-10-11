<?php

namespace App\Query;

use App\Enum\OptadApiUrl;
use App\Infrastructure\HttpClient\OptadHttpClient;
use Symfony\Component\Serializer\SerializerInterface;

class GetOptadInfoQuery
{
    public function __construct(private OptadHttpClient $optadHttpClient, private SerializerInterface $serializer)
    {
    }

    public function __invoke(): string
    {
        $url = OptadApiUrl::URL();
        $response = $this->optadHttpClient->request($url->getValue());
        $data = $response->getContent();

        return $this->serializer->serialize($data, 'json');
    }
}