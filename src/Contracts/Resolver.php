<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

use DateTime;
use MiBo\VAT\VAT;

/**
 * Interface Resolver
 *
 * @package MiBo\VAT\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface Resolver
{
    /**
     * Retrieves the VAT based on given category and country code.
     *
     * @param string $category The category of the VAT.
     * @param string $countryCode The country code of the VAT.
     *
     * @return \MiBo\VAT\VAT The VAT.
     */
    public static function retrieveByCategory(string $category, string $countryCode): VAT;

    /**
     * Tells how much is the VAT in percentage (e.g. 21% => 0.21).
     *
     * One MUST return a value between 0 and 1.
     *
     *  If time is provided, the returned value is the VAT for that period of time. Any time that is not
     * before now, should be considered as now. If time is not provided, the returned value is the current VAT.
     *
     * @param \MiBo\VAT\VAT $vat The VAT to get the percentage of.
     * @param \DateTime|null $time The time to get the percentage of. If null, the current time is used.
     *
     * @return float|int<0, 1> The percentage of the VAT, between 0 and 1.
     */
    public static function getPercentageOf(VAT $vat, ?DateTime $time = null): float|int;
}
