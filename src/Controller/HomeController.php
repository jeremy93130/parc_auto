<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(VoitureRepository $voiture): Response
    {
        $voitures = $voiture->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'voitures' => $voitures
        ]);
    }

    #[Route("/detail/{id}", name: "details")]

    public function show(VoitureRepository $voiture, $id): Response
    {
        $voitures = $voiture->find($id);

        return $this->render('home/show.html.twig', [
            'show_name' => "Bienvenu chez Show",
            'voiture' => $voitures
        ]);
    }

    #[Route("/locationList", name:"list_location")]

    public function listLocation(LocationRepository $location): Response{

        $locations = $location->findLocationNotNull();
        return $this->render('home/list_location.html.twig', [
            'lists' => $locations
        ]);
    }
}