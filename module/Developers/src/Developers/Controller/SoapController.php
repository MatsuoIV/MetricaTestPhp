<?php

namespace Developers\Controller;

ini_set("soap.wsdl_cache_enabled", 0);

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;

require_once __DIR__ . '/../Service/serviceAPI.php';

class SoapController extends AbstractActionController
{
    private $_options;
    private $_URI = "http://metrica.local/soap";
    private $_WSDL_URI = "http://metrica.local/soap?wsdl";

    public function indexAction()
    {
        if (isset($_GET['wsdl'])) {
            $this->handleWSDL();
        } else {
            $this->handleSOAP();
        }
        return $this->getResponse();
    }

    private function handleWSDL()
    {
        $autodiscover = new AutoDiscover();
        $autodiscover->setClass('serviceAPI')
            ->setUri($this->_URI);
        $autodiscover->handle();
    }

    private function handleSOAP()
    {
        $soap = new Server(
            null, array(
                '',
                'wsdl' => $this->_WSDL_URI
            ));
        $soap->setClass('serviceAPI');
        $soap->handle();
    }

}

