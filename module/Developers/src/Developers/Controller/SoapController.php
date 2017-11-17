<?php

namespace Developers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\AutoDiscover as SoapWsdlGenerator;
use Zend\Soap\Server as SoapServer;
use Zend\View\Model\ViewModel;

class SoapController extends AbstractActionController
{
    protected $jsonContent = null;
    private $_URL = "http://metrica.local/soap";

    public function __construct()
    {
        $this->jsonContent = file_get_contents(__DIR__ . '/../../../data/employees.json');
    }
        
    public function soapAction()
    {
        $this->handleWSDL();

//        if (isset($_GET['wsdl'])) {
//            $this->handleWSDL();
//        } else {
//            $this->handleSOAP();
//        }

        $view = new ViewModel();
        $view->setTerminal(true);
        exit();
    }

    public function handleWSDL()
    {
        $autodiscover = new SoapWsdlGenerator();

        $autodiscover->setClass('\Developers\Service\HelloWorldService');

        $autodiscover->setUri('http://metrica.local/soap');
        $wsdl = $autodiscover->generate();
        $wsdl->
        $wsdl = $wsdl->toDomDocument();

        echo $wsdl->saveXML();
    }

    public function handleSOAP()
    {
        $soap = new SoapServer($this->_URL);

        $soap->setClass('\Developers\Service\HelloWorldService');

        $soap->handle();
    }
}

