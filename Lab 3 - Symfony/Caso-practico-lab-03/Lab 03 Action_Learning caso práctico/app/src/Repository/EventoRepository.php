<?php

use App\Repository;

use App\Entity\Evento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 *@extends ServiceEntityRepository<Evento> 
 *
 * @method Evento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evento[]    findAll()
 * @method Evento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * 
 * Estos métodos los ofrece el repositorio para interacctuar con la base de datos
 */

 class EventoRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $registry){

        parent::__construct($registry, Evento::class);

    }

    public function add(Evento $evento, bool $flush = false): void{

        $this->getEntityManager()->persist($evento);

        if($flush){
            $this->getEntityManager()->flush();
        }


    }

    public function remove(Evento $evento, bool $flush = false): void{

        $this->getEntityManager()->remove($evento);

        if($flush){
            $this->getEntityManager()->flush();
        }


    }




 }
