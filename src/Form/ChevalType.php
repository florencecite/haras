<?php

namespace App\Form;

use App\Entity\Cheval;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChevalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, ["label" => "Nom :"])
            ->add('lieu',TextType::class, ["label" => "Lieu:"])
            ->add('alimentation',TextType::class, ["label" => "Alimentation :"])
            ->add('veto',TextType::class, ["label" => "Veto :"])
            ->add('imageFile', FileType ::class,["label" =>"Image :", "required"=>false])
            ->remove('updatedAt',)
            ->remove('imageName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cheval::class,
        ]);
    }
}
