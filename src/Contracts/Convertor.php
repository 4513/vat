<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

use MiBo\VAT\VAT;

/**
 * Interface Convertor
 *
 * @package MiBo\VAT\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface Convertor
{
    /**
     * Converts a VAT for a category from one country to another.
     *
     * @param \MiBo\VAT\VAT $vat The VAT to convert.
     * @param string $countryCode The country code to convert to.
     *
     * @return \MiBo\VAT\VAT The converted VAT.
     */
    public static function convertForCountry(VAT $vat, string $countryCode): VAT;
}
