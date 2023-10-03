<?php

declare(strict_types=1);

namespace MiBo\VAT\Exceptions;

use Throwable;

/**
 * Class UnknownCountryToConvertException
 *
 * @package MiBo\VAT\Exceptions
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class UnknownCountryToConvertException extends FailedToConvertVATException
{
    public function __construct(string $country, ?Throwable $previous = null)
    {
        parent::__construct('Failed to convert the VAT for country \'' . $country . '\'', 0, $previous);
    }
}
