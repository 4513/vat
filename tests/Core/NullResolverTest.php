<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use MiBo\VAT\Resolvers\NullResolver;
use MiBo\VAT\VAT;
use PHPUnit\Framework\TestCase;

/**
 * Class NullResolverTest
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\VAT\Resolvers\NullResolver
 */
class NullResolverTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::convertForCountry
     *
     * @return void
     */
    public function testConvertForCountry(): void
    {
        $vat = NullResolver::convertForCountry(VAT::get("SK"), "SK");
        $this->assertTrue($vat->isNone());
    }

    /**
     * @small
     *
     * @covers ::retrieveByCategory
     *
     * @return void
     */
    public function testRetrieveByCategory(): void
    {
        $vat = NullResolver::retrieveByCategory("none", "SK");
        $this->assertTrue($vat->isNone());
    }

    /**
     * @small
     *
     * @covers ::getPercentageOf
     *
     * @return void
     */
    public function testGetPercentageOf(): void
    {
        $this->assertSame(0, NullResolver::getPercentageOf(VAT::get("SK")));
    }
}
