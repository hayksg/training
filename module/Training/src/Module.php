<?php

namespace Training;

use Zend\ModuleManager\ModuleManagerInterface;
use Zend\Mvc\MvcEvent;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'invokables' => [
                'eventOnGetGreeting' => Service\EventOnGreetingService::class,
            ],
            'factories' => [
                'greetingService' => Service\GreetingServiceFactory::class,
                'greetingAggregate' => Event\GreetingServiceListenerAggregateFactory::class,
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\IndexController::class => function ($container) {
                    $ctr = new Controller\IndexController();
                    $ctr->setGreetingService($container->get('greetingService'));
                    return $ctr;
                },
            ],
        ];
    }

    public function getControllerPluginConfig()
    {
        return [
            'invokables' => [
                'getDate' => Controller\Plugin\GetDate::class,
            ],
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'getTime' => View\Helper\GetTime::class,
            ],
        ];
    }

    /*public function init(ModuleManagerInterface $moduleManager)
    {
        $moduleManager->getEventManager()->getSharedManager()->attach(
            __NAMESPACE__,
            'dispatch',
            [$this, 'onInit']
        );
    }*/

    /*public function onInit()
    {
        echo __METHOD__;
    }*/

    /*public function onBootstrap(MvcEvent $event)
    {
        $event->getApplication()->getEventManager()->getSharedManager()->attach(
            __NAMESPACE__,
            'dispatch',
            function ($event) {
                $controller = $event->getTarget();
                $controller->layout('layout/layoutTraining');
            },
            100
        );
    }*/


}
