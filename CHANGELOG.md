# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.0.1] - 2023-11-05

### Fixed
- VAT - Comparing VATs

## [2.0.0] - 2023-10-03

### Added
- Contracts - SubjectToTax
- Contracts - TaxExceptionInterface
- Contracts - TaxpayerIdentificationNumberInterface
- Exceptions - MissingTINException

### Added
- Contracts - Convertor - convert method
- Contracts - SubjectToValueAddedTax
- Contracts - ValueAddedTaxIdentificationNumberInterface
- Contracts - ValueResolver
- Contracts - VATExceptionInterface
- Contracts - VATResolver
- Exceptions - CouldNotRetrieveVATInformationException
- Exceptions - FailedToConvertVATException
- Exceptions - SubjectDoesNotHaveVATINException
- Exceptions - UnknownCountryToConvertException
- Manager

### Changed
- VAT - Final class
- VAT - Get method requires DateTime
- VAT - Get method requires ProductTaxonomy instead of string-category

### Removed
- Contracts - Convertor - convertForCountry method
- Resolvers - ProxyResolver
- Resolvers - NullResolver
