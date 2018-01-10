<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AjaxController extends AbstractActionController
{
    public function indexAction()
    {
        return [];
    }

    public function manageAction()
    {
        $output = '';
        $response = $this->getResponse();
        $request  = $this->getRequest();

        if ($request->isPost()) {
            $firstName = trim(htmlentities($request->getPost('firstName')));
            $lastName  = trim(htmlentities($request->getPost('lastName')));

            if (! empty($firstName) && ! empty($lastName)) {
                $output = 'Hello ' . $firstName . ' ' . $lastName;
            } else {
                $output = 'Bad request';
            }
        }

        $response->setContent(\Zend\Json\Json::encode($output));
        return $response;
    }
}
