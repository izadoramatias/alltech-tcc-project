<?php

namespace App\Controller;

use App\Helper\ResponseHelper;
use App\Helper\SerializeObjectsList;
use App\Repository\DonationsRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DashboardController
{
    private DonationsRepository $donationsRepository;
    private SerializeObjectsList $serializeObjectsList;

    public function __construct(
        DonationsRepository $donationsRepository,
        SerializeObjectsList $serializeObjectsList
    ){
        $this->donationsRepository = $donationsRepository;
        $this->serializeObjectsList = $serializeObjectsList;
    }

    public function listDonation(int $id): JsonResponse
    {
        $donation = $this->donationsRepository->findOneBy(['id_donation' => $id]);

        $response = ResponseHelper::response($donation);

        return new JsonResponse($response->jsonSerialize(), 200, [
            'Content-Type' => 'application/json'
        ]);
    }

    public function listDonations(): JsonResponse
    {
        $donations = $this->donationsRepository->findAll();

        $donationsArray = $this->serializeObjectsList->toArray($donations);

        return new JsonResponse($donationsArray, Response::HTTP_OK, [
            'Content-Type' => 'application/json'
        ]);
    }
}