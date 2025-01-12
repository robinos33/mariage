<?php
declare(strict_types = 1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfirmationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom :',
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :',
            ])
            ->add('adults_count', IntegerType::class, [
                'label' => 'Nombre d\'adultes :',
            ])
            ->add('children_count', IntegerType::class, [
                'label' => 'Nombre d\'enfants :',
            ])
            ->add('additional_info', TextareaType::class)
            ->add('sleep_on_site', CheckboxType::class, [
                'label' => 'Je dors sur place',
                'required' => false,
                
            ])
            ->add('accommodation_type', ChoiceType::class, [
                'choices' => [
                    'A l\'exterieur du mariage' => 'none',
                    'Gîte partagé' => 'gite',
                    'Tente' => 'tente',
                    'Caravane/Camion/Camping-car' => 'caravane_camion_campingcar',
                ],
                'attr' => ['class' => 'select select-bordered'],
            ])
            ->add('brunch_on_sunday', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Tu restes prendre un brunch le dimanche ?',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Confirmer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
