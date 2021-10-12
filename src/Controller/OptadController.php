<?php

declare(strict_types=1);

namespace App\Controller;

use App\Query\GetOptadInfoQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OptadController extends AbstractController
{
    #[Route('/optad', name: 'optad', methods: 'GET')]
    public function index(GetOptadInfoQuery $query): JsonResponse
    {
        $data = $query();

        return new JsonResponse(
            $data,
            Response::HTTP_OK,
            [],
            true
        );
    }
}
