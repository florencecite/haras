<?php

namespace App\Form;

use App\Entity\Ballade;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BalladeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, ["label" => "Nom :"])
            ->remove('duree')
            ->add('description', CKEditorType::class,['label'=>"Description:"])
            ->add('niveau',TextType::class, ["label" => "Niveau :"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ballade::class,
        ]);
    }
}
