<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ChevalType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserFrontType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label'=>'Nom', 'required'=>true])
            ->add('prenom', TextType::class, ['label'=>'Prenom', 'required'=>true])
            ->add('telephone')
            ->add('email', EmailType::class,['label'=>'Mail',
                    'required'=>true,])
/*            ->add('cheval', TextType::class, ['label'=>'Cheval', 'required'=>true])*/
            ->add('plainpassword', PasswordType::class,['label' =>'Mot de Passe',
            'required'=> false,
            'mapped'=> false])
            ->add('avatar', AvatarType::class)
            ;
        
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
