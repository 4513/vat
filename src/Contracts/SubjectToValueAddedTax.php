<?php

declare(strict_types=1);

namespace MiBo\VAT\Contracts;

use MiBo\Taxonomy\Contracts\SubjectToTax;

/**
 * Interface SubjectToValueAddedTax
 *
 * @package MiBo\VAT\Contracts
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 2.0
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
interface SubjectToValueAddedTax extends SubjectToTax
{
    /**
     * Tells whether the subject is a value added taxpayer.
     *
     *  Person that is a taxpayer is a person that is directly paying the VAT to the
     * tax authority. This is usually the seller of the goods or services.
     *
     *  Consider this method to be almost same as 'isTaxpayer' method, however the
     * taxpayer is every person that is paying any tax, while the return value of
     * this method returns only true if this subject is paying indirect TAX, such
     * as VAT.
     *
     * @return bool True if the subject is a value added taxpayer, false otherwise.
     */
    public function isValueAddedTaxPayer(): bool;

    /**
     * Return Value Added Tax Identification Number of this subject.
     *
     * @return \MiBo\VAT\Contracts\ValueAddedTaxIdentificationNumberInterface The VATIN.
     *
     * @throws \MiBo\VAT\Exceptions\SubjectDoesNotHaveVATINException If the subject does
     *     not have VATIN. One should verify that the subject has been assigned with VATIN.
     */
    public function getVATIN(): ValueAddedTaxIdentificationNumberInterface;

    /**
     * Tells whether the subject has VATIN.
     *
     * @return bool True if the subject has VATIN, false otherwise.
     */
    public function hasVATIN(): bool;
}
