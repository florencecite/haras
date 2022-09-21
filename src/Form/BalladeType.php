<?php

namespace App\Form;

use App\Entity\Ballade;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BalladeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, ["label" => "Nom :"])
            ->add('duree',TextType::class, ["label" => "Duree :"] )
            ->add('description', CKEditorType::class,['label'=>"Description:"])
            ->add('niveau',TextType::class, ["label" => "Niveau :"])
            ->remove('imageName')
            ->add('imageFile', FileType ::class,["label" =>"Image :", "required"=>false])
            ->remove('updatedAt');
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ballade::class,
        ]);
    }
}
