<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

use DateTimeInterface;
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
     * Converts the provided VAT into VAT for the specified country and date.
     *
     *  If the country code is null, the VAT country is kept and only the date is changed. If the date is
     * null, the date is kept. If both are null, the VAT is returned as is.
     *
     *
     * @return \MiBo\VAT\VAT
     *
     * @throws \MiBo\VAT\Exceptions\UnknownCountryToConvertException If the country to convert is unknown
     *     or not supported.
     * @throws \MiBo\VAT\Exceptions\FailedToConvertVATException If the VAT cannot be converted.
     */
    public function convert(VAT $vat, ?string $countryCode = null, ?DateTimeInterface $date = null): VAT;
}
