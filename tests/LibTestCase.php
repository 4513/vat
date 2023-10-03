<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use MiBo\Taxonomy\Contracts\ProductTaxonomy;
use MiBo\VAT\Manager;
use PHPUnit\Framework\TestCase;

/**
 * Class LibTestCase
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
abstract class LibTestCase extends TestCase
{
    private Manager $manager;

    final protected function getManager(): Manager
    {
        return $this->manager;
    }

    final protected function getClassification(int $id): ProductTaxonomy
    {
        // @phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
        return new class ($id) implements ProductTaxonomy
        {
            public function __construct(private int $id)
            {
            }

            public function getCode(): string
            {
                return (string) $this->id;
            }

            public function is(string|ProductTaxonomy $code): bool
            {
                return (string) $this->id === ($code instanceof ProductTaxonomy ? $code->getCode() : $code);
            }

            public function belongsTo(string|ProductTaxonomy $code): bool
            {
                return false;
            }

            public function wraps(string|ProductTaxonomy $code): bool
            {
                return false;
            }

            public static function isValid(string $code): bool
            {
                return false;
            }
        };
        // @phpcs:enable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $resolver      = new Resolver();
        $this->manager = new Manager($resolver, $resolver, $resolver);
    }
}
