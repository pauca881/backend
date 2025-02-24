<?php

namespace App\Entity;

use App\Repository\EventoRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=EventoRepository::class)
 */
class Evento{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

     private $id;

     /**
      * @ORM\Column(type="string", length=255)
      */
     private $nombre;

     /**
      * @ORM\Column(type="datetime")
      */
     private $fecha;


      /**
      * @ORM\Column(type="string", length=255)
      */
     private $ubicacion;


     /**
      * @ORM\Column(type="string", length=255)
      */
      private $descripcion;

      /**
       * @ORM\ManyToMany(targetEntity=Usuario::class, mappedBy="eventos")
       */

       private $assistentes; 

       public function __construct(){

        $this->assistentes = new ArrayCollection();


       }

       public function getId(): ?int{

        return $this->id;

       }

       public function getNombre(): ?string{

        return $this->nombre;

       }
       
       public function getFecha(): ?\DateTimeInterface{

        return $this->fecha;

       }
       
       public function getUbicacion(): ?string{

        return $this->ubicacion;

       }

       public function getDescripcion(): ?string{

        return $this->descripcion;

       }

       public function getAssistentes(): ?ArrayCollection{

        return $this->assistentes;

       }

       //El self sirve para devuelva el objeto actual
       public function setNombre(string $nombre): self{

        $this->nombre = $nombre;
        return $this;

       }

       public function setFecha(\DateTimeInterface $fecha): self{

        $this->fecha = $fecha;
        return $this;

       }
       
       public function setUbicacion(string $ubicacion): self{

        $this->ubicacion = $ubicacion;
        return $this;

       }

       public function setDescripcion(string $descripcion): self{

        $this->descripcion = $descripcion;
        return $this;

       }    
    

}