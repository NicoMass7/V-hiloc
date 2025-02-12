<?php

namespace App\Entity;

use App\Repository\CarRepository;
use App\Enum\GearBoxType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  #[Assert\NotBlank()]
  private ?string $name = null;

  #[ORM\Column(type: Types::TEXT)]
  private ?string $description = null;

  #[ORM\Column]
  private ?int $monthlyPrice = null;

  #[ORM\Column]
  private ?int $dailyPrice = null;

  #[ORM\Column(type: 'integer')]
  #[Assert\Range(min: 1, max: 9, notInRangeMessage: 'Le nombre de places doit être entre {{ min }} et {{ max }}.')]
  private ?int $numberOfPlaces = null;

  #[ORM\Column(type: 'string', enumType: GearBoxType::class)]
  private GearBoxType $gearBox;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): static
  {
    $this->name = $name;

    return $this;
  }

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(string $description): static
  {
    $this->description = $description;

    return $this;
  }

  public function getMonthlyPrice(): ?int
  {
    return $this->monthlyPrice;
  }

  public function setMonthlyPrice(int $monthlyPrice): static
  {
    $this->monthlyPrice = $monthlyPrice;

    return $this;
  }

  public function getDailyPrice(): ?int
  {
    return $this->dailyPrice;
  }

  public function setDailyPrice(int $dailyPrice): static
  {
    $this->dailyPrice = $dailyPrice;

    return $this;
  }

  public function getNumberOfPlaces(): ?string
  {
    return $this->numberOfPlaces;
  }

  public function setNumberOfPlaces(string $numberOfPlaces): static
  {
    $this->numberOfPlaces = $numberOfPlaces;

    return $this;
  }

  public function getGearBox(): ?GearBoxType
  {
    return $this->gearBox;
  }

  public function setGearBox(GearBoxType $gearBox): static
  {
    $this->gearBox = $gearBox;

    return $this;
  }
}
