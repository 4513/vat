<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use MiBo\VAT\Enums\VATRate;
use MiBo\VAT\Resolvers\ProxyResolver;
use MiBo\VAT\VAT;
use PHPUnit\Framework\TestCase;

/**
 * Class ProxyResolverTest
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\VAT\Resolvers\ProxyResolver
 */
class ProxyResolverTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::setConvertor
     * @covers ::convertForCountry
     *
     * @return void
     */
    public function testConvertor(): void
    {
        ProxyResolver::setConvertor(TestingResolver::class);

        $vat = ProxyResolver::convertForCountry(new VAT("SK", VATRate::STANDARD), "SK");

        $this->assertTrue($vat->isStandard());

        $vat = ProxyResolver::convertForCountry(new VAT("SK", VATRate::STANDARD), "CZ");

        $this->assertFalse($vat->isStandard());
    }

    /**
     * @small
     *
     * @covers ::setResolver
     * @covers ::retrieveByCategory
     * @covers ::getPercentageOf
     *
     * @return void
     */
    public function testResolver(): void
    {
        ProxyResolver::setResolver(TestingResolver::class);

        $this->assertTrue(ProxyResolver::retrieveByCategory("", "SK")->isNone());
        $this->assertTrue(ProxyResolver::getPercentageOf(new VAT("SK", VATRate::STANDARD)) === 0);
    }
}
