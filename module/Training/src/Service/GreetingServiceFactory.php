<?php

namespace Training\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class GreetingServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : GreetingService
    {
        $greetingService = new GreetingService();
        $greetingService->setEventManager($container->get('EventManager'));

        $greetingService->getEventManager()->attach(
            'getGreeting',
            function ($event) use ($container) {
                //$hour = $event->getParam('hour');
                $params = $event->getParams();
                $container->get('eventOnGetGreeting')->onGetGreeting($params);
            },
            100
        );

        $loggerService = $container->get('loggerService');

        if (! ($greetingService instanceof GreetingService)) {
            $loggerService('An Error Occurred');
            return false;
        } else {
            return $greetingService;
        }
    }
}
