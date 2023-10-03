<?php

declare(strict_types=1);

namespace MiBo\VAT\Tests;

use Carbon\Carbon;
use DateTimeInterface;
use MiBo\Taxonomy\Contracts\ProductTaxonomy;
use MiBo\VAT\Contracts\Convertor;
use MiBo\VAT\Contracts\ValueResolver;
use MiBo\VAT\Contracts\VATResolver;
use MiBo\VAT\Enums\VATRate;
use MiBo\VAT\Exceptions\CouldNotRetrieveVATInformationException;
use MiBo\VAT\Exceptions\UnknownCountryToConvertException;
use MiBo\VAT\VAT;
use Stringable;

/**
 * Class Resolver
 *
 * @package MiBo\VAT\Tests
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Resolver implements Convertor, VATResolver, ValueResolver
{
    public function convert(VAT $vat, ?string $countryCode = null, ?DateTimeInterface $date = null): VAT
    {
        try {
            return $this->retrieveVAT(
                $vat->getClassification(),
                $countryCode ?? $vat->getCountryCode(),
                $date ?? $vat->getDate()
            );
        } catch (CouldNotRetrieveVATInformationException $e) {
            throw new UnknownCountryToConvertException($countryCode ?? '', $e);
        }
    }

    public function retrieveVAT(
        ProductTaxonomy $classification,
        Stringable|string $countryCode,
        ?DateTimeInterface $date
    ): VAT
    {
        $class = (int) $classification->getCode();
        $rates = [
            'CZ' => [
                [1,2,3,4,5,6,7,8,9],
                [0],
            ],
            'SK' => [
                [1,2,3,4,5],
                [6,7,8,9,0],
            ],
        ];

        if (empty($rates[$countryCode])) {
            throw new CouldNotRetrieveVATInformationException($countryCode, $date ?? Carbon::now());
        }

        $rate  = in_array($class, $rates[$countryCode][0], true) ? VATRate::STANDARD : VATRate::REDUCED;

        return VAT::get($countryCode, $rate, $classification, $date ?? Carbon::now());
    }

    public function getValueOfVAT(VAT $vat): float|int
    {
        return match ($vat->getRate()->name) {
            VATRate::NONE->name     => 0,
            VATRate::REDUCED->name  => 5,
            VATRate::STANDARD->name => 20,
            default                 => 20,
        };
    }
}
