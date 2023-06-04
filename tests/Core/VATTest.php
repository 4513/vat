<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use MiBo\VAT\Enums\VATRate;
use MiBo\VAT\VAT;
use PHPUnit\Framework\TestCase;
use function PHPStan\dumpType;

/**
 * Class VATTest
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\VAT\VAT
 */
class VATTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::__call
     * @covers ::getRate
     *
     * @return void
     */
    public function testProxy(): void
    {
        $vat = new VAT("SK", VATRate::SUPER_REDUCED);

        $this->assertTrue($vat->isSuperReduced());
        $this->assertTrue($vat->getRate()->isSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::getCategory
     *
     * @return void
     */
    public function testCategory(): void
    {
        $vat = new VAT("SK", VATRate::STANDARD, "food");

        $this->assertEquals("food", $vat->getCategory());
    }

    /**
     * @small
     *
     * @covers ::__construct
     * @covers ::getCountryCode
     *
     * @return void
     */
    public function testCountry(): void
    {
        $vat = new VAT("SK", VATRate::STANDARD, "food");

        $this->assertEquals("SK", $vat->getCountryCode());
    }

    /**
     * @small
     *
     * @covers ::is
     *
     * @return void
     */
    public function testIs(): void
    {
        $vat = new VAT("SK", VATRate::STANDARD, "food");

        $this->assertTrue($vat->is(new VAT("SK", VATRate::STANDARD, "food")));
        $this->assertTrue($vat->is(new VAT("SK", VATRate::STANDARD)));
    }
}
