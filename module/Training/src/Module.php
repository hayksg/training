<?php

namespace Training;

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
}
