<?php

declare(strict_types=1);

namespace MiBo\VAT\Exceptions;

use MiBo\VAT\Contracts\VATExceptionInterface;
use RuntimeException;

/**
 * Class SubjectDoesNotHaveVATINException
 *
 * @package MiBo\VAT\Exceptions
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class SubjectDoesNotHaveVATINException extends RuntimeException implements VATExceptionInterface
{
}
