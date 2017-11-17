<?php

namespace Developers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $jsonContent = null;

    public function __construct()
    {
        $this->jsonContent = file_get_contents(__DIR__ . '/../../../data/employees.json');
    }

    public function indexAction()
    {
        $search = "";
        $decodedContent = json_decode($this->jsonContent, true);
        $request = $this->getRequest();

        if ($request->isPost()) {
            $formData = $request->getPost();
            $search = $formData["email"];
            if ($search !== "") {
                $decodedContent = array_filter($decodedContent, function($arr) use ($search)
                    {
                        return (strpos($arr["email"], $search) !== false);
                    });
            }            
        }

        return new ViewModel(array(
            'employees' => $decodedContent,
            'search'    => $search,
        ));
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');
        $decodedContent = json_decode($this->jsonContent, true);

        foreach ($decodedContent as $detail) {
            if ($detail["id"] == $id) {
                $employee = $detail;
            }
        }

        return new ViewModel(array(
            'employee'  => $employee
        ));
    }


}

