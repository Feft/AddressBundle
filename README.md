Address
=======

International mailing address created in Symfony2.

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
$ php app/console doctrine:schema:update --dump-sql
```
Usage
-----
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
  
  return array(
            'address' => $address
        );
        
```
Twig file:
```twig
  <h3>Address</h3>
  <p>
      Country: {{ address.getCountry.getName }}, local name: {{ address.getCountry.getLocalShortName }} <br />
      Region: {{ address.getRegion.getName }} <br />
      street: {{ address.getStreet.getName }} {{ address.getNumber }} <br />
      Zip code and Locality: {{ address.getPostalCode.getCode }} {{ address.getLocality.getName }} <br />
  </p>
```
Html result:  
### Address  
Country: Poland, local name: Polska  
Region: śląskie  
street: Wolności 20 m. 21  
Zip code and Locality: 43-100 Tychy  

Authors
-------
The bundle was created by Piotr Pikuła. See the list of [contributors][2].

[1]: http://getcomposer.org/
[2]: https://github.com/Feft/AddressBundle/graphs/contributors
