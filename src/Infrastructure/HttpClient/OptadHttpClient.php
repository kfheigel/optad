<?php

declare(strict_types=1);

namespace App\Infrastructure\HttpClient;

use App\Infrastructure\Exception\OptadException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class OptadHttpClient
{
    private array $requestData;

    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    public function addMethod()
    {
        return $this->requestData['method'] = 'GET';
    }

    public function addUrl(string $url)
    {
        return $this->requestData['url'] = $url;
    }

    public function addAcceptHeaders()
    {
        return $this->requestData['headers'] = ['headers' => ['accept' => 'application/json']];
    }

    /**
     * @param string $urlEnding
     *
     * @throws OptadException
     */
    public function request(string $url): ResponseInterface
    {
        try {
            return $this->httpClient->request($this->addMethod(), $this->addUrl($url), $this->addAcceptHeaders());
        } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            throw new OptadException('Error', 100, $e);
        }
    }
}
