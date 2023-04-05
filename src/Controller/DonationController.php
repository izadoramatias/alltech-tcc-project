<?php

namespace App\Controller;

use App\Helper\ResponseHelper;
use App\Helper\SerializeObjectsList;
use App\Repository\DonationsRepository;
use App\Service\DonationDTO;
use App\Service\ValidateDonationForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DonationController
{
    private EntityManagerInterface $entityManager;
    private ValidateDonationForm $validateForm;
    private DonationsRepository $donationsRepository;
    private DonationDTO $donationDTO;
    private SerializeObjectsList $serializeObjectsList;

    public function __construct(
        EntityManagerInterface $entityManager,
        ValidateDonationForm $validateForm,
        DonationsRepository $donationsRepository,
        DonationDTO $donationDTO,
        SerializeObjectsList $serializeObjectsList
    ) {
        $this->entityManager = $entityManager;
        $this->validateForm = $validateForm;
        $this->donationsRepository = $donationsRepository;
        $this->donationDTO = $donationDTO;
        $this->serializeObjectsList = $serializeObjectsList;
    }

    public function newDonation(Request $request): JsonResponse
    {
        $content = $request->getContent();
        $validatedData = $this->validateForm->validateData(json_decode($content));
        $donationData = json_decode($validatedData, true);

        $dto = $this->donationDTO->createDonationEntity($donationData);

        $this->entityManager->persist($dto);
        $this->entityManager->flush();


//        echo "<pre>";
//        var_dump($donation);
//        echo "</pre>";

        return new JsonResponse($dto->jsonSerialize(),Response::HTTP_CREATED);
    }

    public function listDonation(int $id): JsonResponse
    {
        $donation = $this->donationsRepository->findOneBy(['id_donation' => $id]);

        $response = ResponseHelper::response($donation);

        return new JsonResponse($response->jsonSerialize(), 200);
    }


        public function listDonations(): JsonResponse
        {
            $donations = $this->donationsRepository->findAll();

            $donationsArray = $this->serializeObjectsList->toArray($donations);

            return new JsonResponse($donationsArray, 200);
        }
}
