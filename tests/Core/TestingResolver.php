<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use DateTime;
use MiBo\VAT\Contracts\Convertor;
use MiBo\VAT\Contracts\Resolver;
use MiBo\VAT\Resolvers\NullResolver;
use MiBo\VAT\VAT;

/**
 * Class TestingResolver
 *
 * @package MiBo\VAT\Tests
 *
 * @internal For testing only.
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class TestingResolver implements Resolver, Convertor
{
    public static function convertForCountry(VAT $vat, string $countryCode): VAT
    {
        if ($vat->getCountryCode() === $countryCode) {
            return $vat;
        }

        return NullResolver::convertForCountry($vat, $countryCode);
    }

    public static function retrieveByCategory(string $category, string $countryCode): VAT
    {
        return NullResolver::retrieveByCategory($category, $countryCode);
    }

    public static function getPercentageOf(VAT $vat, ?DateTime $time = null): float|int
    {
        return NullResolver::getPercentageOf($vat, $time);
    }
}
