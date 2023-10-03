<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use MiBo\VAT\Exceptions\CouldNotRetrieveVATInformationException;
use MiBo\VAT\Exceptions\UnknownCountryToConvertException;
use MiBo\VAT\Manager;

/**
 * Class ManagerTest
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @coversDefaultClass \MiBo\VAT\Manager
 */
final class ManagerTest extends LibTestCase
{
    /**
     * @small
     *
     * @covers ::retrieveVAT
     * @covers ::convert
     * @covers ::getValueOfVAT
     * @covers ::__construct
     *
     * @return void
     */
    public function testManager(): void
    {
        $manager = new Manager(new Resolver(), new Resolver(), new Resolver());

        $vat1 = $manager->retrieveVAT($this->getClassification(8), 'SK');
        $vat2 = $manager->convert($vat1, 'CZ');

        $this->assertEquals(5, $this->getManager()->getValueOfVAT($vat1));
        $this->assertEquals(20, $this->getManager()->getValueOfVAT($vat2));
    }

    /**
     * @small
     *
     * @covers \MiBo\VAT\Exceptions\CouldNotRetrieveVATInformationException::__construct
     *
     * @return void
     */
    public function testException1(): void
    {
        $this->expectException(CouldNotRetrieveVATInformationException::class);
        $this->getManager()->retrieveVAT($this->getClassification(0), 'UK');
    }

    /**
     * @small
     *
     * @covers \MiBo\VAT\Exceptions\UnknownCountryToConvertException::__construct
     *
     * @return void
     */
    public function testException2(): void
    {
        $this->expectException(UnknownCountryToConvertException::class);
        $this->getManager()->retrieveVAT($this->getClassification(0), 'CZ');
        $this->getManager()->convert(
            $this->getManager()->retrieveVAT($this->getClassification(0), 'CZ'),
            'UK'
        );
    }
}
