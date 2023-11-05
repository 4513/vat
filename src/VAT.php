<?php

declare(strict_types=1);

namespace MiBo\VAT;

use BadMethodCallException;
use DateTimeInterface;
use JetBrains\PhpStorm\Pure;
use MiBo\Taxonomy\Contracts\ProductTaxonomy;
use MiBo\VAT\Enums\VATRate;
use Stringable;

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
final class VAT
{
    private VATRate $rate;

    private ProductTaxonomy $classification;

    private DateTimeInterface $date;

    private string $countryCode;

    /** @var array<string, array<string, array<string, self>>> */
    private static array $instances = [];

    protected function __construct(
        Stringable|string $countryCode,
        VATRate $rate,
        ProductTaxonomy $classification,
        DateTimeInterface $date
    )
    {
        $this->rate           = $rate;
        $this->classification = $classification;
        $this->date           = $date;
        $this->countryCode    = (string) $countryCode;
    }

    /**
     * @internal Use Resolver instead.
     *
     *
     * @return self
     */
    public static function get(
        Stringable|string $countryCode,
        VATRate $rate,
        ProductTaxonomy $classification,
        DateTimeInterface $date
    ): self
    {
        if (!isset(self::$instances[(string) $countryCode][$classification->getCode()][$date->format('Y-m-d')])) {
            self::$instances[(string) $countryCode][$classification->getCode()][$date->format('Y-m-d')] = new self(
                $countryCode, $rate, $classification, $date
            );
        }

        return self::$instances[(string) $countryCode][$classification->getCode()][$date->format('Y-m-d')];
    }

    #[Pure]
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    #[Pure]
    public function getRate(): VATRate
    {
        return $this->rate;
    }

    #[Pure]
    public function getClassification(): ProductTaxonomy
    {
        return $this->classification;
    }

    #[Pure]
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Checks if the VAT is the same as the given one.
     *
     *
     * @return bool
     */
    #[Pure]
    public function is(self $vat, bool $strict = false): bool
    {
        return $strict
            ? $this->classification->is($vat->getClassification())
            && $this->rate->equals($vat->getRate())
            && $this->countryCode === $vat->getCountryCode()
            : $this->classification->is($vat->getClassification());
    }

    /**
     * @param non-empty-string $name
     * @param array<int, null> $arguments
     *
     * @return bool
     *
     * @phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
     */
    #[Pure]
    public function __call(string $name, array $arguments): bool
    {
        if (method_exists($this->rate, $name)) {
            // @phpstan-ignore-next-line
            return $this->rate->$name();
        }

        throw new BadMethodCallException('Method ' . $name . ' does not exists on ' . self::class);
    }
}
