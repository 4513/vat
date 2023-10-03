<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

use DateTimeInterface;
use MiBo\Taxonomy\Contracts\ProductTaxonomy;
use MiBo\VAT\VAT;
use Stringable;

/**
 * Interface VATResolver
 *
 * @package MiBo\VAT\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface VATResolver
{
    /**
     * Retrieves the VAT based on given category and country code.
     *
     * @param \Stringable|string $countryCode The country code of the VAT.
     *
     * @return \MiBo\VAT\VAT The VAT.
     *
     * @throws \MiBo\VAT\Exceptions\CouldNotRetrieveVATInformationException When the VAT could not be
     *     retrieved. This might happen if the country code is not supported, it is out of available
     *     date range or the VAT for given country code did not exist at given date.
     */
    public function retrieveVAT(
        ProductTaxonomy $classification,
        Stringable|string $countryCode,
        ?DateTimeInterface $date
    ): VAT;
}
