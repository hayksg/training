<?php

namespace Training\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class GreetingServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : GreetingService
    {
        $container->get('ModuleManager')->getEventManager()->getSharedManager()->attach(
            'greetingIdentifier',
            'getGreeting',
            function ($event) use ($container) {
                //$hour = $event->getParam('hour');
                $params = $event->getParams();
                $container->get('eventOnGetGreeting')->onGetGreeting($params);
            },
            100
        );

        $greetingService = new GreetingService();
        $greetingService->setEventManager($container->get('EventManager'));

        /*$greetingService->getEventManager()->attach(
            'getGreeting',
            function ($event) use ($container) {
                //$hour = $event->getParam('hour');
                $params = $event->getParams();
                $container->get('eventOnGetGreeting')->onGetGreeting($params);
            },
            100
        );*/

        return $greetingService;

        /*$greetingAggregate = $container->get('greetingAggregate');
        $greetingAggregate->attach($greetingService->getEventManager());
        return $greetingService;*/
    }
}
