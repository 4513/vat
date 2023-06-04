<?php

declare(strict_types=1);

namespace MiBo\VAT\Resolvers;

use DateTime;
use MiBo\VAT\Contracts\Convertor;
use MiBo\VAT\Contracts\Resolver;
use MiBo\VAT\VAT;

/**
 * Class ProxyResolver
 *
 * @package MiBo\VAT\Resolvers
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
class ProxyResolver implements Resolver, Convertor
{
    /** @var class-string<\MiBo\VAT\Contracts\Resolver> */
    private static string $resolverClass = NullResolver::class;

    /** @var class-string<\MiBo\VAT\Contracts\Convertor> */
    private static string $convertorClass = NullResolver::class;

    /**
     * @inheritDoc
     */
    public static function convertForCountry(VAT $vat, string $countryCode): VAT
    {
        return self::$convertorClass::convertForCountry($vat, $countryCode);
    }

    /**
     * @inheritDoc
     */
    public static function retrieveByCategory(string $category, string $countryCode): VAT
    {
        return self::$resolverClass::retrieveByCategory($category, $countryCode);
    }

    /**
     * @inheritDoc
     */
    public static function getPercentageOf(VAT $vat, ?DateTime $time = null): float|int
    {
        return self::$resolverClass::getPercentageOf($vat, $time);
    }

    /**
     * Changes the resolver.
     *
     * @param class-string<\MiBo\VAT\Contracts\Resolver> $resolverClass
     *
     * @return void
     */
    public static function setResolver(string $resolverClass): void
    {
        self::$resolverClass = $resolverClass;
    }

    /**
     * Changes the convertor.
     *
     * @param class-string<\MiBo\VAT\Contracts\Convertor> $convertorClass
     *
     * @return void
     */
    public static function setConvertor(string $convertorClass): void
    {
        self::$convertorClass = $convertorClass;
    }
}
