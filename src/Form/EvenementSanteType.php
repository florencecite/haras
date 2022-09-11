<?php

namespace App\Form;

use App\Entity\EvenementSante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EvenementSanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('soin',TextType::class, ["label" => "Soin :"])
            ->add('date_entree')
            ->add('date_fin')
            ->add('hospitalisation',TextType::class, ["label" => "Hospitalisation :"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EvenementSante::class,
        ]);
    }
}
