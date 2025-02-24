<?php

namespace App\Form;

use App\Entity\Evento;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EventoType extends AbstractType{


    public function buildForm(FormBuilderInterface $builder, array $options): void{


        $builder 
            ->add('nombre', TextType::class, [
                'required' => true,
            ])
            ->add('fecha', DateType::class, [
                'required' => true,
            ])
            ->add('ubicacion', TextType::class, [
                'required' => true,
            ])
            ->add('descripcion', TextareaType::class, [
                'required' => true,
            ])

    }

    public function configureOptions(OptionResolver $resolver): void{

        //Associamos el formulario con la entidad Evento

        $resolver->setDefaults([
            'data_class' => Evento::class,
        ]);

    }

}