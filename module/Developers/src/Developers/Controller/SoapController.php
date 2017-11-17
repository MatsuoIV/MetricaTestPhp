<?php

namespace Developers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\AutoDiscover as SoapWsdlGenerator;
use Zend\Soap\Server as SoapServer;

class SoapController extends AbstractActionController
{
    protected $jsonContent = null;
    
    public function __construct()
    {
        $this->jsonContent = file_get_contents(__DIR__ . '/../../../data/employees.json');
    }
        
    public function soapAction()
    {
        $request = $this->getRequest();

        if (! $request->isGet()) {
            $response = $this->getResponse();
            $response->setStatusCode(405);
            $response->getHeaders()->addHeaderLine('Allow', 'GET');
            return $response;
        }

        $wsdl = new SoapWsdlGenerator();
        $wsdl = $wsdl->generate();        

        $response = $this->getResponse();

        $response->getHeaders()->addHeaderLine('Content-Type', 'application/wsdl+xml');
        $response->setContent($wsdl->toXml());

        return $response;
    }
}

