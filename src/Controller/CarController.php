<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CarController extends AbstractController
{
  #[Route('/car', name: 'app_car_index')]
  public function index(CarRepository $repository): Response
  {
    $cars = $repository->findAll();
    return $this->render('car/index.html.twig', [
      'controller_name' => 'CarController',
      'cars' => $cars,
    ]);
  }

  #[Route('/new', name: 'app_car_new')]
  public function new(Request $request, EntityManagerInterface $em)
  {
    $car = new Car();
    $form = $this->createForm(CarType::class, $car);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $em->persist($car);
      $em->flush();

      return $this->redirectToRoute('app_car_show', ['id' => $car->getId()]);
    }

    return $this->render('car/new.html.twig', [
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_car_show', requirements: ['id' => '\d+'])]
  public function show(?Car $car): Response
  {
    return $this->render('car/show.html.twig', [
      'car' => $car,
    ]);
  }

  #[Route('/car/{id}/delete', name: 'app_car_delete', requirements: ['id' => '\d+'])]
  public function deleteCar(?Car $car, EntityManagerInterface $em)
  {
    if (!$car) {
      $this->addFlash('error', 'Véhicule introuvable.');
    } else {
      $em->remove($car);
      $em->flush();
      $this->addFlash('success', 'Véhicule supprimé avec succès.');
    }

    return $this->redirectToRoute('app_car_index');
  }
}
