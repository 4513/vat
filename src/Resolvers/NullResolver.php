<?php

declare(strict_types=1);

namespace MiBo\VAT\Resolvers;

use DateTime;
use MiBo\VAT\Contracts\Convertor;
use MiBo\VAT\Contracts\Resolver;
use MiBo\VAT\Enums\VATRate;
use MiBo\VAT\VAT;

/**
 * Class NullResolver
 *
 * @package MiBo\VAT\Resolvers
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class NullResolver implements Resolver, Convertor
{
    /**
     * @inheritDoc
     */
    public static function convertForCountry(VAT $vat, string $countryCode): VAT
    {
        return self::retrieveByCategory($vat->getCategory() ?? "", $countryCode);
    }

    /**
     * @inheritDoc
     */
    public static function retrieveByCategory(string $category, string $countryCode): VAT
    {
        return new VAT($countryCode, VATRate::NONE, $category);
    }

    /**
     * @inheritDoc
     */
    public static function getPercentageOf(VAT $vat, ?DateTime $time = null): int
    {
        return 0;
    }
}
