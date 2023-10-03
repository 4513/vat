# VAT  

[![codecov](https://codecov.io/gh/4513/vat/branch/main/graph/badge.svg?token=WNg7IlcDvP)](https://codecov.io/gh/4513/vat)

The library provides common structures for VAT (Value Added Tax). It contains:
* VAT Enum that indicates the VAT rate (none, standard, reduced, second reduced, super reduced, parking, combined)
* VAT Object that contains the main VAT information:
  * VAT rate
  * Country for which the VAT applies
  * Classification of the goods or services to which the VAT applies
* Convertor Interface that allows to convert a VAT Object for another country

#### The 'why' the library is written as is:  
VAT rate is only a simple flag that indicates the percentage of the VAT, however only for a specific country.
The country cannot be determined from the VAT rate alone, nor can the VAT rate be determined from the country
alone. To do so, one needs to know the classification of the goods or services (such as CPA product
classification, CN product classification, etc.). Based on the classification, the VAT rate can be determined
for any country.

 No implementation of the convertor is made in here, because of numbers of different classifications and
lack of information where data for each classification is stored and accessable in a format that can be used.

#### VAT Rates
List of the VAT rates comes from EU:
* Standard (mandatory)
* Reduced (mandatory)
* Second reduced (optional)
* Super reduced (optional)
* Parking (optional)

Next VAT rate that is commonly used is
* None

Except of that VAT rates, two more VAT rates are included for development purposes:
* Combined
  * *The rate is used to determine that a list of goods and/or services contains prices with different VAT rates.
  That avoids incorrect calculations of price with VAT.* 
* Any
  * *The rate should only be used for developers. The rate is created mainly for discount prices that are only later
  applied on goods and/or services and prior to that one does not know the VAT rate of that discount (if not restricted
  to a rate)*

---
### Installation
```bash
composer require mibo/vat
```

### Usage
```php
/** @var \MiBo\Taxonomy\Contracts\ProductTaxonomy $classification */
$classification = {...};
$vat = \MiBo\VAT\VAT::get('SVK', \MiBo\VAT\Enums\VATRate::NONE, $classification, \Carbon\Carbon::now());
```
**Note that when specifying the VAT rate and the classification, that VAT rate might be later changed when the
Resolver finds out that the classification is not valid for the specified VAT rate.** Because of that, better
way to create a VAT object is:

```php
\MiBo\VAT\Contracts\VATResolver::retrieveVAT($classification, 'SVK', \Carbon\Carbon::now());
```

To change the VAT for another country:
```php
$vat = \MiBo\VAT\Contracts\Convertor::convert($vat, 'CZE', \Carbon\Carbon::now());
```

 For now, the country code is not checked and accepts any string value. Later it might be specified whether to
use two or three-letter country code by ISO standard.

Changing or applying Resolver and Convertor:

```php
$manager = new \MiBo\VAT\Manager($myConvertor, $myValueResolver, $myVATResolver);
```
