<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('interne')
            ->add('dateDebut', DateTimeType::class, ["widget"=>"single_text"])
            ->add('dateFin', DateTimeType::class, ["widget"=>"single_text"])
            ->add('texte',CKEditorType::class,['label'=>"Description:"])
            ->add('imageFile', FileType::class,["label" =>"Image :", "required"=>true])
            ->remove('imageName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
