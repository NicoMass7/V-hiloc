<?php

namespace App\Factory;

use App\Entity\Car;
use App\Enum\GearBoxType;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Car>
 */
final class CarFactory extends PersistentProxyObjectFactory
{
  /**
   * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
   *
   * @todo inject services if required
   */
  public function __construct() {}

  public static function class(): string
  {
    return Car::class;
  }

  /**
   * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
   *
   * @todo add your default values here
   */
  protected function defaults(): array|callable
  {
    return [
      'dailyPrice' => self::faker()->randomNumber(),
      'description' => self::faker()->text(),
      'gearBox' => self::faker()->randomElement(GearBoxType::cases()),
      'monthlyPrice' => self::faker()->randomNumber(),
      'name' => self::faker()->text(30),
      'numberOfPlaces' => self::faker()->randomDigitNotNull(),
    ];
  }

  /**
   * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
   */
  protected function initialize(): static
  {
    return $this
      // ->afterInstantiate(function(Car $car): void {})
    ;
  }
}
