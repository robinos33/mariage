<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Confirmation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom :',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 50]),
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 50]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                ],
            ])
            ->add('adults_count', IntegerType::class, [
                'label' => 'Nombre d\'adultes :',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(['value' => 0]),
                ],
            ])
            ->add('children_count', IntegerType::class, [
                'label' => 'Nombre d\'enfants :',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\GreaterThan(['value' => -1]), // Allow zero children
                ],
            ])
            ->add('additional_info', TextareaType::class)
            ->add('sleep_on_site', CheckboxType::class, [
                'required' => false,
            ])
            ->add('accommodation_type', ChoiceType::class, [
                'choices' => [
                    'A l\'exterieur du mariage' => 'none',
                    'Gîte partagé' => 'gite',
                    'Tente' => 'tente',
                    'Caravane/Camion/Camping-car' => 'caravane_camion_campingcar',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                ],
                'attr' => ['class' => 'select select-bordered'],
            ])
            ->add('brunch_on_sunday', CheckboxType::class, [
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Confirmer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Confirmation::class,
            'csrf_protection' => false,
        ]);
    }
}
