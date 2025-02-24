<?php

namespace App\Controller;

user App\Entity\Evento;
use App\Form\EventoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class EventoController extends AbstractController{


    private $entityManager;
    private $formFactory;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory){

        $this->entityMananger = $entityManager;
        $this->formFactory = $formFactory;
        
    }

    public function lista(): Response{

        $eventos = $this->entityManaget->getRepository(Evento::class)->findAll();
        return $this->render('evento/lista.html.twig', [
            'eventos' => $eventos,
        ]);
    }

    public function agregarEvento(Request $request, FormFactoryInterface $formFactory): Response{

        $evento = $this->entityManager->getRepository(Evento::class)->find($id);

        if(!$evento){
            throw $this->createNotFoundException('El evento no se encontró');
        }

        return $this->render('evento/detalle.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}