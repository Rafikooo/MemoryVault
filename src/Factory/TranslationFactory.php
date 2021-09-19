<?php

namespace App\Factory;

use App\Entity\Translation;
use App\Repository\TranslationRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Translation>
 *
 * @method static Translation|Proxy createOne(array $attributes = [])
 * @method static Translation[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Translation|Proxy find(object|array|mixed $criteria)
 * @method static Translation|Proxy findOrCreate(array $attributes)
 * @method static Translation|Proxy first(string $sortedField = 'id')
 * @method static Translation|Proxy last(string $sortedField = 'id')
 * @method static Translation|Proxy random(array $attributes = [])
 * @method static Translation|Proxy randomOrCreate(array $attributes = [])
 * @method static Translation[]|Proxy[] all()
 * @method static Translation[]|Proxy[] findBy(array $attributes)
 * @method static Translation[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Translation[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TranslationRepository|RepositoryProxy repository()
 * @method Translation|Proxy create(array|callable $attributes = [])
 */
final class TranslationFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'source' => self::faker()->text(),
            'translated' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Translation $translation) {})
        ;
    }

    protected static function getClass(): string
    {
        return Translation::class;
    }
}
