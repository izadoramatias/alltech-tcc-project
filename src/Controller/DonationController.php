<?php

namespace App\Controller;

use App\Helper\DonationFactory;
use App\Service\ValidateDonationForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class DonationController
{
    private DonationFactory $donationFactory;
    private EntityManagerInterface $entityManager;
    private ValidateDonationForm $validateForm;

    public function __construct(
        DonationFactory $donationFactory,
        EntityManagerInterface $entityManager,
        ValidateDonationForm $validateForm,
    ) {
        $this->donationFactory = $donationFactory;
        $this->entityManager = $entityManager;
        $this->validateForm = $validateForm;
    }

    public function newDonation(Request $request): Response
    {
        $content = $request->getContent();
        $validatedData = $this->validateForm->validateData(json_decode($content));
        $json = json_decode($validatedData);

        $donation = $this->donationFactory->createDonation($json);
        $donationEntity = $this->donationFactory->createDonationEntity($donation);

        $this->entityManager->persist($donationEntity);
        $this->entityManager->flush();


//        echo "<pre>";
//        var_dump($donation);
//        echo "</pre>";

        return new JsonResponse($donationEntity->jsonSerialize(),Response::HTTP_CREATED);
    }
}