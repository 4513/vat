<?php

declare(strict_types=1);

namespace MiBo\VAT\Exceptions;

use DateTimeInterface;
use LogicException;
use MiBo\VAT\Contracts\VATExceptionInterface;
use Throwable;

/**
 * Class RateForCountryDidNotExistException
 *
 * @package MiBo\VAT\Exceptions
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class CouldNotRetrieveVATInformationException extends LogicException implements VATExceptionInterface
{
    public function __construct(string $countryCode, DateTimeInterface $date, ?Throwable $previous = null)
    {
        parent::__construct(
            strtr(
                'Missing information about VAT for country :country at date :date.',
                [
                    ':country' => $countryCode,
                    ':date' => $date->format('Y-m-d'),
                ]
            ),
            0,
            $previous
        );
    }
}
