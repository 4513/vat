<?php

declare(strict_types=1);

namespace MiBo\VAT;

use DateTimeInterface;
use MiBo\Taxonomy\Contracts\ProductTaxonomy;
use MiBo\VAT\Contracts\Convertor;
use MiBo\VAT\Contracts\ValueResolver;
use MiBo\VAT\Contracts\VATResolver;
use Stringable;

/**
 * Class Manager
 *
 * @package MiBo\VAT
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Manager implements Convertor, ValueResolver, VATResolver
{
    private Convertor $convertor;

    private ValueResolver $valueResolver;

    private VATResolver $VATResolver;

    public function __construct(Convertor $convertor, ValueResolver $valueResolver, VATResolver $VATResolver)
    {
        $this->convertor = $convertor;
        $this->valueResolver = $valueResolver;
        $this->VATResolver = $VATResolver;
    }

    /**
     * @inheritDoc
     */
    public function convert(VAT $vat, ?string $countryCode = null, ?DateTimeInterface $date = null): VAT
    {
        return $this->convertor->convert($vat, $countryCode, $date);
    }

    /**
     * @inheritDoc
     */
    public function retrieveVAT(
        ProductTaxonomy $classification,
        Stringable|string $countryCode,
        ?DateTimeInterface $date = null
    ): VAT
    {
        return $this->VATResolver->retrieveVAT($classification, $countryCode, $date);
    }

    /**
     * @inheritDoc
     */
    public function getValueOfVAT(VAT $vat): float|int
    {
        return $this->valueResolver->getValueOfVAT($vat);
    }
}
