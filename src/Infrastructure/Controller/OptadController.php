<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Aplication\Query\GetOptadDatabaseInfoQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OptadController extends AbstractController
{
    #[Route('/optad', name: 'optad', methods: 'GET')]
    public function index(GetOptadDatabaseInfoQuery $query): JsonResponse
    {
        $data = $query();
//        dump(($data));

        return new JsonResponse(
            $data,
            Response::HTTP_OK,
            []
        );
    }
}
