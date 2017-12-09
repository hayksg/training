<?php

namespace Training\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
use Training\Service\GreetingServiceInterface;

class IndexController extends AbstractActionController
{
    private $greetingService;

    /*public function onDispatch(MvcEvent $e)
    {
        $this->layout('layout/layoutTraining');
        return parent::onDispatch($e);
    }*/

    public function indexAction()
    {
        return new ViewModel([
            'greeting' => $this->getGreetingService()->getGreeting(),
            //'greeting' => 'Hello',
        ]);
    }

    public function setGreetingService(GreetingServiceInterface $greetingService)
    {
        $this->greetingService = $greetingService;
    }

    public function getGreetingService()
    {
        return $this->greetingService;
    }
}
