<?php

declare(strict_types=1);

namespace MiBo\VAT\Enums;

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
    case ANY;
    case COMBINED;
    case NONE;
    case PARKING;
    case REDUCED;
    case SECOND_REDUCED;
    case STANDARD;
    case SUPER_REDUCED;

    /**
     * Whether the VAT rate is any.
     *
     * @return bool
     */
    public function isAny(): bool
    {
        return $this->equals(self::ANY);
    }

    /**
     * Whether the VAT rate is not any.
     *
     * @return bool
     */
    public function isNotAny(): bool
    {
        return !$this->isAny();
    }

    /**
     * Whether the VAT rate is combined.
     *
     * @return bool
     */
    public function isCombined(): bool
    {
        return $this->equals(self::COMBINED);
    }

    /**
     * Whether the VAT rate is not combined.
     *
     * @return bool
     */
    public function isNotCombined(): bool
    {
        return !$this->isCombined();
    }

    /**
     * Whether the VAT rate is none.
     *
     * @return bool
     */
    public function isNone(): bool
    {
        return $this->equals(self::NONE);
    }

    /**
     * Whether the VAT rate is not none.
     *
     * @return bool
     */
    public function isNotNone(): bool
    {
        return !$this->isNone();
    }

    /**
     * Whether the VAT rate is parking.
     *
     * @return bool
     */
    public function isParking(): bool
    {
        return $this->equals(self::PARKING);
    }

    /**
     * Whether the VAT rate is not parking.
     *
     * @return bool
     */
    public function isNotParking(): bool
    {
        return !$this->isParking();
    }

    /**
     * Whether the VAT rate is reduced.
     *
     * @return bool
     */
    public function isReduced(): bool
    {
        return $this->equals(self::REDUCED);
    }

    /**
     * Whether the VAT rate is not reduced.
     *
     * @return bool
     */
    public function isNotReduced(): bool
    {
        return !$this->isReduced();
    }

    /**
     * Whether the VAT rate is second reduced.
     *
     * @return bool
     */
    public function isSecondReduced(): bool
    {
        return $this->equals(self::SECOND_REDUCED);
    }

    /**
     * Whether the VAT rate is not second reduced.
     *
     * @return bool
     */
    public function isNotSecondReduced(): bool
    {
        return !$this->isSecondReduced();
    }

    /**
     * Whether the VAT rate is standard.
     *
     * @return bool
     */
    public function isStandard(): bool
    {
        return $this->equals(self::STANDARD);
    }

    /**
     * Whether the VAT rate is not standard.
     *
     * @return bool
     */
    public function isNotStandard(): bool
    {
        return !$this->isStandard();
    }

    /**
     * Whether the VAT rate is super reduced.
     *
     * @return bool
     */
    public function isSuperReduced(): bool
    {
        return $this->equals(self::SUPER_REDUCED);
    }

    /**
     * Whether the VAT rate is not super reduced.
     *
     * @return bool
     */
    public function isNotSuperReduced(): bool
    {
        return !$this->isSuperReduced();
    }

    /**
     * Get VAT rate by name.
     *
     * @param \MiBo\VAT\Enums\VATRate $rate
     *
     * @return bool
     */
    public function equals(VATRate $rate): bool
    {
        return $this->name === $rate->name;
    }
}
