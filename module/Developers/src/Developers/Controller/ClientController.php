<?php

namespace Developers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\Client;

class ClientController extends AbstractActionController
{

    public function indexAction()
    {
        $client = new Client("http://metrica.local/soap?wsdl");
        $result = $client->getEmployeesBySalary(0, 1500);
        print_r($result);
    }
}

