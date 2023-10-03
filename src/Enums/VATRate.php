<?php

declare(strict_types=1);

namespace MiBo\VAT\Enums;

use JetBrains\PhpStorm\Pure;

/**
 * Enum VATRate
 *
 * @package MiBo\VAT\Enums
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
enum VATRate
{
    /**
     * Any VAT rate.
     *
     *  This rate is used internally inside the library and should be used only when calculating
     * multiple prices. The point of this rate is that there might be a price that one does not
     * care about its VAT rate. For example, when trying to apply a discount to a price, the
     * value of that discount usually has not specified VAT rate. In such case, the discount
     * is created with 'ANY' VAT rate.
     */
    case ANY;

    /**
     * Combined VAT rate.
     *
     *  This rate is used internally, however we do see its advantage in combining multiple prices.
     * When two or more prices with different VAT rates are combined, the resulting price's VAT rate
     * should be marked as 'COMBINED' to indicate that the VAT rate is not a single one. This avoids
     * confusion when trying to calculate the value with VAT of the final price.
     */
    case COMBINED;

    /**
     * None VAT rate.
     *
     *  Some countries might have a VAT rate of 0 % for specific goods or services. This rate is
     * used to indicate that the price has no VAT rate.
     */
    case NONE;

    /**
     * Parking VAT rate.
     *
     *  Some European countries apply the parking VAT rate. Because of specifications of the VAT
     * rates by EU, some goods could not be categorized as reduced VAT rate nor standard. That
     * created the need of the parking rate which is between 12 % and the country's standard VAT
     * rate.
     *
     *  Belgium uses parking VAT rate of 12 % for certain energy products such as coal, solid fuel,
     * coke and semi-coke from coal, lignite and peat, etc.
     */
    case PARKING;

    /**
     * Reduced VAT rate.
     *
     *  Reduced VAT rate is one of two mandatory VAT rates in EU. That means all the EU countries
     * must have a reduced VAT rate. The reduced VAT rate is usually applied to goods and services
     * that are considered to be essential for the population. The reduced VAT rate is usually
     * between 5 % and 15 %.
     *
     *  The EU orders the reduced VAT rate to be no less than 5 %.
     */
    case REDUCED;

    /**
     * Second reduced VAT rate.
     *
     *  Second reduced VAT rate is optional VAT rate in EU. Some countries do use this rate for
     * goods and services that are considered to be essential for the population, such as mass
     * public transportation of passengers, water treatment and distribution, library services,
     * baby food and formulas, drinking water, etc.
     */
    case SECOND_REDUCED;

    /**
     * Standard VAT rate.
     *
     *  Standard VAT rate is one of two mandatory VAT rates in EU. That means all the EU countries
     * must have a standard VAT rate. The standard VAT rate is usually applied to goods and services
     * that are considered to be non-essential for the population.
     *
     *  The EU orders the standard VAT rate to be no less than 15 %.
     */
    case STANDARD;

    /**
     * Super reduced VAT rate.
     *
     *  Super reduced VAT rates are rates that can be lower than 5 %.
     */
    case SUPER_REDUCED;

    /**
     * Whether the VAT rate is any.
     *
     * @return bool
     */
    #[Pure]
    public function isAny(): bool
    {
        return $this->equals(self::ANY);
    }

    /**
     * Whether the VAT rate is not any.
     *
     * @return bool
     */
    #[Pure]
    public function isNotAny(): bool
    {
        return !$this->isAny();
    }

    /**
     * Whether the VAT rate is combined.
     *
     * @return bool
     */
    #[Pure]
    public function isCombined(): bool
    {
        return $this->equals(self::COMBINED);
    }

    /**
     * Whether the VAT rate is not combined.
     *
     * @return bool
     */
    #[Pure]
    public function isNotCombined(): bool
    {
        return !$this->isCombined();
    }

    /**
     * Whether the VAT rate is none.
     *
     * @return bool
     */
    #[Pure]
    public function isNone(): bool
    {
        return $this->equals(self::NONE);
    }

    /**
     * Whether the VAT rate is not none.
     *
     * @return bool
     */
    #[Pure]
    public function isNotNone(): bool
    {
        return !$this->isNone();
    }

    /**
     * Whether the VAT rate is parking.
     *
     * @return bool
     */
    #[Pure]
    public function isParking(): bool
    {
        return $this->equals(self::PARKING);
    }

    /**
     * Whether the VAT rate is not parking.
     *
     * @return bool
     */
    #[Pure]
    public function isNotParking(): bool
    {
        return !$this->isParking();
    }

    /**
     * Whether the VAT rate is reduced.
     *
     * @return bool
     */
    #[Pure]
    public function isReduced(): bool
    {
        return $this->equals(self::REDUCED);
    }

    /**
     * Whether the VAT rate is not reduced.
     *
     * @return bool
     */
    #[Pure]
    public function isNotReduced(): bool
    {
        return !$this->isReduced();
    }

    /**
     * Whether the VAT rate is second reduced.
     *
     * @return bool
     */
    #[Pure]
    public function isSecondReduced(): bool
    {
        return $this->equals(self::SECOND_REDUCED);
    }

    /**
     * Whether the VAT rate is not second reduced.
     *
     * @return bool
     */
    #[Pure]
    public function isNotSecondReduced(): bool
    {
        return !$this->isSecondReduced();
    }

    /**
     * Whether the VAT rate is standard.
     *
     * @return bool
     */
    #[Pure]
    public function isStandard(): bool
    {
        return $this->equals(self::STANDARD);
    }

    /**
     * Whether the VAT rate is not standard.
     *
     * @return bool
     */
    #[Pure]
    public function isNotStandard(): bool
    {
        return !$this->isStandard();
    }

    /**
     * Whether the VAT rate is super reduced.
     *
     * @return bool
     */
    #[Pure]
    public function isSuperReduced(): bool
    {
        return $this->equals(self::SUPER_REDUCED);
    }

    /**
     * Whether the VAT rate is not super reduced.
     *
     * @return bool
     */
    #[Pure]
    public function isNotSuperReduced(): bool
    {
        return !$this->isSuperReduced();
    }

    /**
     * Get VAT rate by name.
     *
     * @param \MiBo\VAT\Enums\VATRate $rate VAT rate to compare.
     *
     * @return bool
     */
    #[Pure]
    public function equals(self $rate): bool
    {
        return $this->name === $rate->name;
    }
}
