<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_username', TextType::class, [
                'label' => 'Pseudo',
                'attr' => ['class' => 'form-control']
            ])
            ->add('_password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['class' => 'form-control']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Se connecter',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }
}
