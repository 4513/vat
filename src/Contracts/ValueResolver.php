<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

use MiBo\VAT\VAT;

/**
 * Interface ValueResolver
 *
 * @package MiBo\VAT\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface ValueResolver
{
    /**
     * Tells how much is the VAT in percentage (e.g. 21 % => 21).
     *
     * One MUST return a value between 0 and 100.
     *
     * @param \MiBo\VAT\VAT $vat The VAT to get the percentage of.
     *
     * @return float|int<0, 100> The percentage of the VAT, between 0 and 100.
     */
    public function getValueOfVAT(VAT $vat): float|int;
}
