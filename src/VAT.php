<?php

declare(strict_types=1);

namespace MiBo\VAT;

use MiBo\VAT\Enums\VATRate;

/**
 * Class VAT
 *
 * @package MiBo\VAT
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 *
 * @mixin \MiBo\VAT\Enums\VATRate
 */
class VAT
{
    private VATRate $rate;

    private string $countryCode;

    private ?string $category;

    public function __construct(string $countryCode, VATRate $rate = VATRate::STANDARD, ?string $category = null)
    {
        $this->countryCode = $countryCode;
        $this->rate        = $rate;
        $this->category    = $category;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @return \MiBo\VAT\Enums\VATRate
     */
    public function getRate(): VATRate
    {
        return $this->rate;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Checks if the VAT is the same as the given one.
     *
     * @param \MiBo\VAT\VAT $vat
     *
     * @return bool
     */
    public function is(VAT $vat): bool
    {
        return ($this->category !== null && $vat->getCategory() !== null && $this->category === $vat->getCategory()) ||
            (
                $this->countryCode === $vat->getCountryCode() &&
                $this->rate->equals($vat->getRate())
            );
    }

    /**
     * @param string $name
     * @param array<int, mixed> $arguments
     *
     * @return bool
     */
    public function __call(string $name, array $arguments): bool
    {
        return $this->rate->$name();
    }
}
