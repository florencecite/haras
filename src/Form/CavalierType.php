<?php

namespace App\Form;

use App\Entity\Cavalier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\Persisters\Entity\BasicEntityPersister;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CavalierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("nom", TextType::class, ["label" => "Nom :"])
            ->add("prenom",TextType::class, ["label" => "Prenom :"])
            ->add('mail',)
            ->add('imageFile', FileType ::class,["label" =>"Image :", "required"=>false])
            ->remove('updatedAt',)
            ->remove('imageName')
            ->add('niveau',TextType::class, ["label" => "Niveau :"]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cavalier::class,
        ]);
    }
}
