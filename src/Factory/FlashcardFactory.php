<?php

namespace App\Factory;

use App\Entity\Flashcard;
use App\Repository\FlashcardRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Flashcard>
 *
 * @method static Flashcard|Proxy createOne(array $attributes = [])
 * @method static Flashcard[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Flashcard|Proxy find(object|array|mixed $criteria)
 * @method static Flashcard|Proxy findOrCreate(array $attributes)
 * @method static Flashcard|Proxy first(string $sortedField = 'id')
 * @method static Flashcard|Proxy last(string $sortedField = 'id')
 * @method static Flashcard|Proxy random(array $attributes = [])
 * @method static Flashcard|Proxy randomOrCreate(array $attributes = [])
 * @method static Flashcard[]|Proxy[] all()
 * @method static Flashcard[]|Proxy[] findBy(array $attributes)
 * @method static Flashcard[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Flashcard[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static FlashcardRepository|RepositoryProxy repository()
 * @method Flashcard|Proxy create(array|callable $attributes = [])
 */
final class FlashcardFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            'source' => self::faker()->languageCode(),
            'translated' => self::faker()->text(10),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Flashcard $translation) {})
        ;
    }

    protected static function getClass(): string
    {
        return Flashcard::class;
    }
}
