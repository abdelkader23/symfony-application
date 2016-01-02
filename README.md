# Symfony Application

[![Latest Stable Version](http://img.shields.io/packagist/v/endroid/symfony-application.svg)](https://packagist.org/packages/endroid/symfony-application)
[![Build Status](http://img.shields.io/travis/endroid/symfony-application.svg)](https://travis-ci.org/endroid/symfony-application)
[![Scrutinizer Quality Score](http://img.shields.io/scrutinizer/g/endroid/symfony-application.svg)](https://scrutinizer-ci.com/g/endroid/symfony-application/)
[![Total Downloads](http://img.shields.io/packagist/dt/endroid/symfony-application.svg)](https://packagist.org/packages/endroid/symfony-application)
[![License](http://img.shields.io/packagist/l/endroid/symfony-application.svg)](https://packagist.org/packages/endroid/symfony-application)

This project provides tools for quickly setting up a robust web application. It
provides out of the box features and code samples to perform common tasks such
as authentication, search functionality, PDF generation and site administration.

The application is built on [`symfony/symfony-standard`](https://github.com/symfony/symfony-standard)
and extended with mostly popular and well-maintained community bundles. You can
pick and choose which functionalities you like to use or use the application as
a reference as it provides many code examples.

All high-level features are made available via separate bundles in the src/
directory instead of the AppBundle. Reason for this approach is that the user
should be able to compose an application with only the features he needs. This
can now be achieved by removing a bundle (and its configuration). Of course
generic bundles are moved to a separate repository.

## Live demo

Browse the live demo to get a quick impression of the available features.

  * [`Home page`](http://symfony-application.endroid.nl/)
  * [`Admin section`](http://symfony-application.endroid.nl/admin/dashboard) (admin/admin)
  * [`API Documentation and sandbox`](http://symfony-application.endroid.nl/api-doc)
  * [`Generated PDF`](http://symfony-application.endroid.nl/admin/dashboard)

## Installation

Use [Composer](https://getcomposer.org/) to install the application.

    composer create-project endroid/symfony-application

As soon as the application is created you can remove any unnecessary features.
Of course you can also start from symfony/symfony-standard and only copy the
necessary code or keep this demo as a reference.

## Documentation

Documentation can be found in `Resources/doc/index.md`

[Read the documentation for master](https://github.com/endroid/symfony-application/tree/master/src/AppBundle/Resources/doc/index.md)

## Versioning

Version numbers follow the MAJOR.MINOR.PATCH scheme. Backwards compatible
changes will be kept to a minimum but be aware that these can occur. Lock your
dependencies for production and test your code when upgrading.

## License

This bundle is under the MIT license. For the full copyright and license
information please view the LICENSE file that was distributed with this source
code.