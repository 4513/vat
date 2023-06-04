<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use MiBo\VAT\Enums\VATRate;
use PHPUnit\Framework\TestCase;

/**
 * Class RateTest
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\VAT\Enums\VATRate
 */
class RateTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testAny(): void
    {
        $rate = VATRate::ANY;

        $this->assertTrue($rate->isAny());
        $this->assertFalse($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testCombined(): void
    {
        $rate = VATRate::COMBINED;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertTrue($rate->isCombined());
        $this->assertFalse($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testNone(): void
    {
        $rate = VATRate::NONE;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertTrue($rate->isNone());
        $this->assertFalse($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testParking(): void
    {
        $rate = VATRate::PARKING;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertTrue($rate->isParking());
        $this->assertFalse($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testReduced(): void
    {
        $rate = VATRate::REDUCED;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertTrue($rate->isReduced());
        $this->assertFalse($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testSecondReduced(): void
    {
        $rate = VATRate::SECOND_REDUCED;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertTrue($rate->isSecondReduced());
        $this->assertFalse($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testStandard(): void
    {
        $rate = VATRate::STANDARD;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertTrue($rate->isStandard());
        $this->assertFalse($rate->isNotStandard());
        $this->assertFalse($rate->isSuperReduced());
        $this->assertTrue($rate->isNotSuperReduced());
    }

    /**
     * @small
     *
     * @covers ::isAny
     * @covers ::isNotAny
     * @covers ::isCombined
     * @covers ::isNotCombined
     * @covers ::isNone
     * @covers ::isNotNone
     * @covers ::isParking
     * @covers ::isNotParking
     * @covers ::isReduced
     * @covers ::isNotReduced
     * @covers ::isSecondReduced
     * @covers ::isNotSecondReduced
     * @covers ::isStandard
     * @covers ::isNotStandard
     * @covers ::isSuperReduced
     * @covers ::isNotSuperReduced
     * @covers ::equals
     *
     * @return void
     */
    public function testSuperReduced(): void
    {
        $rate = VATRate::SUPER_REDUCED;

        $this->assertFalse($rate->isAny());
        $this->assertTrue($rate->isNotAny());
        $this->assertFalse($rate->isCombined());
        $this->assertTrue($rate->isNotCombined());
        $this->assertFalse($rate->isNone());
        $this->assertTrue($rate->isNotNone());
        $this->assertFalse($rate->isParking());
        $this->assertTrue($rate->isNotParking());
        $this->assertFalse($rate->isReduced());
        $this->assertTrue($rate->isNotReduced());
        $this->assertFalse($rate->isSecondReduced());
        $this->assertTrue($rate->isNotSecondReduced());
        $this->assertFalse($rate->isStandard());
        $this->assertTrue($rate->isNotStandard());
        $this->assertTrue($rate->isSuperReduced());
        $this->assertFalse($rate->isNotSuperReduced());
    }
}
