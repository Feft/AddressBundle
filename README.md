[![SensioLabsInsight](https://insight.sensiolabs.com/projects/12bb57cb-483e-41a1-b026-948d8f388d22/big.png)](https://insight.sensiolabs.com/projects/12bb57cb-483e-41a1-b026-948d8f388d22)

Address
=======

International mailing address created in Symfony2. Format examples on [http://www.bitboost.com/ref/international-address-formats.html#Formats][3]

The code is compatible with php 7.1 and 5.6 versions.

Installation
------------

Install the library using [composer][1]. Add the new line to your `composer.json` file:

```json
{
    "require": {
        "feft/address-bundle": "dev-master"
    }, 
}
```

Now run the `install` command.

```sh
$ php composer.phar install
```
or use Makefile (only if you are using Docker):
```sh
make composer
```
PhpUnit
-------
To run unittests use command (only if you are using Docker):
```sh
make php5.6-phpunit5
```
Enable the bundle
-----------------
Enable the bundle in the kernel:
```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new \Feft\AddressBundle\FeftAddressBundle(),
    );
}
```
Update doctrine schema
----------------------
```sh
$ php app/console doctrine:schema:update --force
```
CRUD operations
---------------
Every entity has CRUD Controller to show/add/edit/delete operation, eg. to manage countries use link like this: http://localhost/address/web/app.php/country/

Usage
-----
Simple use:
```php
        $factory = new AddressFactory();

        $addressData = array(
            "countryName" => "Poland",
            "countryAlpha2Code" => "PL",
            "countryLocalShortName" => "Polska",
            "localityName" => "Tychy",
            "regionName" => "śląskie",
            "streetName" => "Freedom",
            "postalCode" => "43-100",
            "streetNumber" => "20 m. 21",
        );

        $address = $factory->getAddressObject($addressData);

        return array(
            'address' => $address,
        );
```
For more examples see unit tests folder.

Controller file:  
```php
  use Feft\AddressBundle\Entity\Address;
  use Feft\AddressBundle\Entity\Country;
  use Feft\AddressBundle\Entity\Locality;
  use Feft\AddressBundle\Entity\PostalCode;
  use Feft\AddressBundle\Entity\Region;
  use Feft\AddressBundle\Entity\Street;
  use Feft\AddressBundle\Model\PostalValidator\Factory;

  $country = new Country("Poland","PL");
  $country->setLocalShortName("Polska");
  
  $locality = new Locality();
  $locality->setName("Tychy");
  
  $region = new Region();
  $region->setName("śląskie");
  $locality->setRegion($region);
  $country->addRegion($locality->getRegion());
  $locality->getRegion()->setCountry($country);
  
  $street = new Street();
  $street->setName("Wolności");
 
  $code = new PostalCode();
  $code->setCode("43-100");
  $code->setValidator(Factory::getInstance($code,$country->getCode()));

  $address = new Address();
  $address->setCountry($country);
  $address->setRegion($region);
  $address->setLocality($locality);
  $address->setStreet($street);
  $address->setNumber("20 m. 21");
  $address->setPostalCode($code);
  
  $codeValidatingResult = $code->validate();
  
  $options = array("showCountryName" => true);
    
  return array(
    'address' => $address,
    "options" => $options
  );
        
```
Twig file:
```twig
  <p> {{ address_formatter(address,options)|raw }} </p>
  <p>or inline format: {{ address_inline_formatter(address,options) }} </p>
```
Html result:  
  Wolności 20 m. 21  
  43-100 Tychy  
  Poland  
or inline format: Wolności 20 m. 21, 43-100 Tychy, Poland

Authors
-------
The bundle was created by Piotr Pikuła. See the list of [contributors][2].

[1]: http://getcomposer.org/
[2]: https://github.com/Feft/AddressBundle/graphs/contributors
[3]: http://www.bitboost.com/ref/international-address-formats.html#Formats
