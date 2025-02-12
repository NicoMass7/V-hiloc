<?php

namespace App\Form;

use App\Entity\Car;
use App\Enum\GearBoxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CarType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('name', TextType::class, [
        'label' => 'Nom du véhicule',
      ])
      ->add('description', TextType::class, [
        'label' => 'Description',
      ])
      ->add('monthlyPrice', IntegerType::class, [
        'label' => 'Prix mensuel',
      ])
      ->add('dailyPrice', IntegerType::class, [
        'label' => 'Prix journalier',
      ])
      ->add('numberOfPlaces', ChoiceType::class, [
        'choices' => array_combine(range(1, 9), range(1, 9)),
        'constraints' => new Range(min: 1, max: 9),
        'label' => 'Nombre de places',
      ])
      ->add('gearBox', ChoiceType::class, [
        'choices' => [
          'Manuelle' => GearBoxType::MANUAL,
          'Automatique' => GearBoxType::AUTOMATIC,
        ],
        'label' => 'Boîte de vitesse',
      ]);;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Car::class,
    ]);
  }
}
