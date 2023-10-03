<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

/**
 * Interface ValueAddedTaxIdentificationNumberInterface
 *
 *  A value-added tax identification number or VAT identification number (VATIN) is an identifier used in
 * many countries, including the countries of the European Union, for value added tax purposes. In the EU,
 * a VAT identification number can be verified online at the EU's official VIES website. It confirms that
 * the number is currently allocated and can provide the name or other identifying details of the entity to
 * whom the identifier has been allocated.
 *
 *  The full identifier starts with an ISO 3166-1 alpha-2 (2 letters) country code (except for Greece) and
 * then has between 2 and 12 characters.
 *
 * @package MiBo\VAT\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface ValueAddedTaxIdentificationNumberInterface
{
    /**
     * @return non-empty-string The VATIN.
     */
    public function getId(): string;
}
