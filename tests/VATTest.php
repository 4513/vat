<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

/**
 * Class VATTest
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\VAT\VAT
 */
final class VATTest extends LibTestCase
{
    /**
     * @small
     *
     * @covers ::__call
     * @covers ::getRate
     * @covers ::get
     * @covers ::__construct
     * @covers ::getCountryCode
     * @covers ::getClassification
     * @covers ::getDate
     * @covers ::is
     *
     * @return void
     */
    public function testRateMagic(): void
    {
        $vat = $this->getManager()->retrieveVAT(
            $this->getClassification(1),
            'CZ'
        );

        $this->assertTrue($vat->isStandard());
        $this->assertSame('1', $vat->getClassification()->getCode());
        $this->assertSame('CZ', $vat->getCountryCode());
        $this->assertTrue($vat->getDate()->isToday());
        $this->assertTrue($vat->is($vat));
        $this->assertTrue($vat->is($vat, true));
    }
}
