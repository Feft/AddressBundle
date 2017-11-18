<?php
namespace Feft\AddressBundle\Controller;

use Feft\AddressBundle\Model\AddressFactory\AddressFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Form\Type\AddressType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * How can you use AddressBundle
 *
 * @Route("/")
 */
class ExampleController extends Controller
{
    /**
     * How to use AddressBundle
     *
     * @Route("/example/", name="example")
     * @Method("GET")
     * @Template("FeftAddressBundle:Example:index.html.twig")
     *
     * @return array
     */
    public function indexAction()
    {
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
    }
}